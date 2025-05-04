<?php
// Verifica o token CSRF

session_start();
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erro: token CSRF inválido.");
}

include_once('connect.php');

if (isset($_POST['submit'])) {

    $nome = strip_tags($_POST['nome']);
    $sobrenome = strip_tags($_POST['sobrenome']);
    $data_nasc = $_POST['data_nasc'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $connection->prepare("INSERT INTO usuarios (nome,sobrenome,data_nasc,email,senha) VALUES (:nome,:sobrenome,:data_nasc,:email,:senha)");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':data_nasc', $data_nasc);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha_hash);

    $stmt->execute();

    header('Location: ../html/cursos.php');
    exit();
    
    $connection = null;
};
