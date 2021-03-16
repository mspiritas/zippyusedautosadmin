<?php
    $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=u8ckduy45131xbnf';
    $username = 'n44smu5vkfdfwrj1';
    $password = 'gcnquhx9y4dq5i0b';

    try {
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }