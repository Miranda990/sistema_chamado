<?php
//Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$setor = $_POST['setor'];
$senha = $_POST['senha'];

//CHAMANDO O ARQUIVO DE CONEXÃO COMO BANCO DE DADOS
    include 'conexao.php';

$insert = "INSERT INTO tb_user VALUES (null,'Leo','leo@gmail.com','secretaria','123456')";

$query = $conexao->query($insert);

if ($conexao->query($insert)) {
    echo "<script>alert('Usuário Cadastrado com Sucesso!'); location.href = '../cadastro.html'</script>";

}
?>