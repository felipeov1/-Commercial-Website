<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <div class="tela-login">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <h5>Digite seus dados para acessar.</h5>
            <input type="text" name="email" placeholder="Digite seu email">
            <br><br>
            <input type="password" name="password" placeholder="Digite sua senha">
            <br><br>
            <input class="btn-login" type="submit" name="submit" value="Enviar" />
        </form>
    </div>
</body>
</html>