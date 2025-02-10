<?php

include('conexao.php');
include('indexcadastro.php');

$nomecompleto = ($_POST['nome_completo']);
$email = ($_POST['email']);
$senha = ($_POST['senha']);

$sql_check = "SELECT * FROM usuarios WHERE EMAIL = '$email'";
$sql_check_query = $mysqli->query($sql_check);


if(strlen($email) == 0){
    echo "<script>alert('Por favor digite um email')</script>";
} else if(strlen($senha) == 0){
    echo "<script>alert('Por favor digite sua senha.')</script>";
}
    else if(strlen($nomecompleto) == 0){
        echo "<script>alert('Por favor digite seu nome')</script>";
    }
else if(mysqli_num_rows($sql_check_query) > 0) {
    echo "<script>alert('O email já está registrado. Tente novamente.')</script>";
} else {
    $sql_code = "INSERT INTO usuarios (NOME, EMAIL, SENHA) VALUES ('$nomecompleto', '$email', '$senha')";
    $sql_query = $mysqli->query($sql_code);

    if($sql_query) {
        echo "<script>alert('Cadastro concluído com sucesso.')</script>";
        echo "<script>window.location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar.')</script>";
    }
}
