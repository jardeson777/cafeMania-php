<?php
    $url = 'mysql:host=127.0.0.1:3308;dbname=bancozilla';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($url, $user, $password);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>