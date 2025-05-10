<?php

if (isset($_POST['submit'])) {
    include_once('connect.php');

    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $connection->prepare("SELECT * FROM usuarios WHERE email=:email");

    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login-register/register.html');
        exit();
    }

    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['senha'] = $usuario['senha']; 
        $_SESSION['email'] = $usuario['email'];
        header('Location: ../html/cursos.php');
        exit;
    } else /*Senha incorreta */ {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../html/login.html');
        exit;
    }
} else {
    header('Location:../login-register/register.html');
    exit;
}
