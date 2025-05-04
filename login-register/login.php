<!-- <?php
    session_start();

    if (empty($_SESSION['csrf_token_login'])) {
        $_SESSION['csrf_token_login'] = bin2hex(random_bytes(32));
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/login-register.css" rel="stylesheet">
    <link href="../fonts/fonts.css" rel="stylesheet">
</head>
<body>
    <header>
            <h1><span id="e">E</span>lias - <span id="e">E</span>book</h1>
    </header>
    <main>
        <h2>LOGIN</h2>
        <form action="../php/logar.php" method="post">

            <input type="email" placeholder="Email" name="email" maxlength="50">
            <input type="password" placeholder="Senha" name="senha" minlength="8" maxlength="8">

            <input type="hidden" name="csrf_token_login" value="<?php echo $_SESSION['csrf_token_login']; ?>">
             
            <input class="up "type="submit" value="Entrar" name="submit">
        </form>
        <div>
            <p>Não tem uma conta? <br> <a href="./register.php">Criar uma<a></p>
        </div>
    </main> 
</body>
</html>