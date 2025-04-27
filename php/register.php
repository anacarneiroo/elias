<?php
    include_once('connect.php');

    if(isset($_POST['submit'])){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nasc = $_POST['data_nasc'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $connection -> prepare("INSERT INTO usuarios (nome,sobrenome,data_nasc,email,senha) VALUES (:nome,:sobrenome,:data_nasc,:email,:senha)");

        $stmt -> bindParam(':nome',$nome);
        $stmt -> bindParam(':sobrenome',$sobrenome);
        $stmt -> bindParam(':data_nasc',$data_nasc);
        $stmt -> bindParam(':email',$email);
        $stmt -> bindParam(':senha',$senha);

        $stmt -> execute();

        header('../html/cursos.php');

        $connection = null;

    };

?>