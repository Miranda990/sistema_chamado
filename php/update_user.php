<?php
// CAPTURA O VALOR NA URL DO SITE
$id = $_GET['codigo'];

// INCLUINDO O ARQUIVO DE CONEXÃO 
include 'conexao.php';

// INSTRUÇÃO DO SQL PARA CAPTURAR USUARIO DIGITADO NA TELA DE LOGIN
$select = "SELECT * FROM tb_user WHERE id_user = '$id'";

// FUNÇÃO QUERY EXECUTA O SELECT DENTRO DO BANCO
$query = $conexao->query($select);

// ARMAZENA A 1ª LINHA DO BD DENTRO DA VARIAVEL RESULTADO 
$resultado = $query->fetch_assoc();

// VERIFICA SE O FORMULÁRIO FOI ENVIADO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $setor = $_POST['setor'];

    // INSTRUÇÃO SQL PARA FAZER O UPDATE
    $update = "UPDATE tb_user SET nm_user = '$nome', email = '$email', setor = '$setor' WHERE id_user = '$id'";

    // EXECUTA O UPDATE
    if ($conexao->query($update) === TRUE) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='listar_usuario.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <aside>
            <img src="images/deadpool.png" alt="imagem">
        </aside>
        <!-- Action manda pro php -->
        <form action="#" method="post">
                <label for="nome">NOME</label>
                <input type="text" name="nome" value="<?php echo $resultado['nm_user']; ?>" id="nome">
                
                <label for="email">EMAIL</label>
                <input type="text" name="email" value="<?php echo $resultado['email']; ?>" id="email">

                <label for="setor">SETOR</label>
                <input type="text" name="setor" value="<?php echo $resultado['setor']; ?>" id="setor">

                <label for="senha">SENHA</label>
                <input type="text" name="senha" value="<?php echo $resultado['senha']; ?>" id="senha">

                <br>

                <div class="botao">
                <button type="submit">CADASTRAR</button>
                <br>
                <a href="">Voltar</a>
            </div>
        </form>
    </div>

</body>
</html>