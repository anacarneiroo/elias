<?php

session_start();
if (!isset($_POST['csrf_token_login']) || $_POST['csrf_token_login'] !== $_SESSION['csrf_token_login']) {
    die("Erro: token CSRF inválido.");
}

if (isset($_POST['submit'])) {
    include_once('connect.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $connection->prepare("SELECT * FROM usuarios WHERE email=:email");

    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login-register/register.php');
    }

    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../html/cursos.php');
        exit;
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../html/cursos.php');
        exit;
    }
} else {
    header('Location:../login-register/register.php');
    exit;
}
