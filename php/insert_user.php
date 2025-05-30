<?php
include 'conexao.php';

//Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$setor = $_POST['setor'];
$senha = $_POST['senha'];

//CHAMANDO O ARQUIVO DE CONEXÃO COMO BANCO DE DADOS
    

$insert = "INSERT INTO tb_user VALUES (null,'$nome','$email','$setor','$senha')";

if ($conexao->query($insert)) {
    echo "<script>alert('Usuário Cadastrado com Sucesso!'); location.href = '../cadastro.html'</script>";
}

$conn->clone();
?>