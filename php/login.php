<?php

    session_start();

    if(isset($_POST['submit'])){
        include_once('connect.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $connection -> prepare("SELECT * FROM usuarios WHERE email=:email and senha=:senha");

        $stmt -> bindParam(':email',$email);
        $stmt -> execute();

        if($stmt -> rowCount() < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../login-register/register.html');
        }

        else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../html/cursos.php');
            exit;
        }

    } else {
        header('Location:../login-register/register.html');
        exit;
    }
?>