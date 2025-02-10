<?php

include('protecao.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de administrador</title>
    <link rel="stylesheet" href="estilos/style2.css">
    <style>
        .sair {
    color: white;
    text-decoration: none;
    }
    </style>
</head>
<body>
    <div class="content">
        <h2>Bem-vindo ao Painel, <span><?php echo $_SESSION['user'];?><span></h2> <br>
        <h3>Para acessar o estoque clique no botão abaixo!</h3> <br>
        <button><a href="principal.php">Acessar estoque</a></button>
    </div>

    <div class="footer">
        <img src="images/logo.png" alt="">
        <p><strong>Criado por:</strong> Guilherme Alves de Lima.</p>
        <a href="logout.php" class="sair">Sair da conta</a>
    </div>
</body>
</html>
