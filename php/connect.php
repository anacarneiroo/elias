<?php
    $host = 'localhost';
    $database = 'elias_ebook';
    $user = 'root';
    $password = '';

    $connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
?>