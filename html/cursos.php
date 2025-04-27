<?php
    session_start();

    if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login-register/login.html');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSOS | EB</title>
</head>
<body>
    <header>
        
    </header>
    <main>

    </main>
</body>
</html>