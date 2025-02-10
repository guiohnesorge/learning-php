<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>
    <main>
        <section class="login">
            <div class="wrapper">
                <img src="./images/logo.png" class="login__logo">
                <h1 class="login__title">Realizar Cadastro</h1>
        
                <form class="login__form" action="cadastro.php" method="post">
                    <label class="login__label">
                    <span>Seu nome</span>
                    <input type="text" name="nome_completo" required id="form_field" class="input">
                    </label>

                    <label class="login__label">
                    <span>Email</span>
                    <input type="text" name="email" class="input" required id="form_field">
                    </label>
    
                    <label class="login__label">
                    <span>Senha</span>
                    <input type="password" name="senha" class="input" required id="form_field">
                    </label>
    
                    <button type="submit" class="login__button">Fazer Cadastro</button>
                    <p class="p_cadastro">Já tem conta? <br> <a href="index.php">Realizar login</a></p>
                </form>
            </div>
        </section>
    <section class="wallpaper"></section>
  </main>