<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <div class="page">
        <form action="testLogin.php" method="POST"  class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input name="email" type="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input name="password" type="password" placeholder="Digite sua senha" />
            <a href="/">Esqueci minha senha</a>
            <input name="submit" type="submit" value="Acessar" class="btn" />
        </form>
    </div>
</body>

</html>