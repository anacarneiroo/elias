<?php
    session_start();

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } 
?> 
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO | EB </title>
    <link href="../fonts/fonts.css" rel="stylesheet">
    <link href="../css/login-register.css" rel="stylesheet">
</head>

<body>
    <header>
        <div>
            <h1><span id="e">E</span>lias - <span id="e">E</span>book</h1>
        </div>
    </header>
    <main>
        <h2>CRIAR CONTA</h2>

        <form action="../php/registrar.php" method="POST">
            <input type="text" placeholder="Nome" name="nome" maxlength="40" required>
            <input type="text" placeholder="Sobrenome" name="sobrenome" required maxlength="50">
            <input type="date" name="data_nasc" required>
            <input type="email" placeholder="Email" name="email" required maxlength="50">
            <input type="password" placeholder="Senha" name="senha" required maxlength="8" minlength="8">

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>"> 

            <input class="up" type="submit" value="Entrar" name="submit">
        </form>

        <div>
            <p>Já possuo uma conta! <br> <a href="./login.php" target="self">Fazer Login</a></p>
        </div>
    </main>
</body>

</html>