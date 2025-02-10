<?php

include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    
    if(strlen($_POST['email']) == 0){
        echo "<script>alert('Por favor digite seu email.')</script>";
    } else if(strlen($_POST['senha']) == 0){
        echo "<script>alert('Por favor digite sua senha.')</script>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE EMAIL = '$email' AND SENHA = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die('Erro de conexão' . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['user'] = $usuario['NOME'];

            header("Location: painel.php");

        } else {
            echo "<script>alert('Falha ao logar. Email ou senha incorretos.')</script>";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <section class="login">
            <div class="wrapper">
                <img src="./images/logo.png" class="login__logo">
                <h1 class="login__title">Fazer login</h1>
        
                <form class="login__form" action="" method="post">
                    <label class="login__label">
                    <span>Email</span>
                    <input type="text" name="email" class="input" required id="form_field">
                    </label>
    
                    <label class="login__label">
                    <span>Senha</span>
                    <input type="password" name="senha" class="input" required id="form_field">
                    </label>
    
                    <button type="submit" class="login__button">Fazer Login</button>
                    <p class="p_cadastro">Não tem conta? <br> <a href="indexcadastro.php">Realizar cadastro.</a></p>
                </form>
            </div>
        </section>
    <section class="wallpaper"></section>
  </main>
</body>
</html>