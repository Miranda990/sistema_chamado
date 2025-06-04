<?php
// receber os dados da tela de login
$email = $_POST ['email'];
$senha = $_POST ['senha'];

// incluindo o arquivo de conexão
include 'conexao.php';

// intrução de selct para capturar usuario digitado na tela de login
$select = "SELECT * FROM tb_user WHERE email = '$email'";

// query executa o select dentro do banco
$query = $conexao->query($select);

// armazena a 1° linha do bd dentro da variavel resultado
$resultado = $query->fetch_assoc();

// 
$email_banco = $resultado ['email'];
$senha_banco = $resultado ['senha'];

// compara as informações do index com o banco 
if ($email == $email_banco && $senha == $senha_banco) {
    header('location: ../home.html');
}else {
    echo "<script>alert('Usuário ou Senha incorreta!'); history.back() </script>";
}

?>