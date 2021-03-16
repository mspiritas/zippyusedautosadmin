<?php
    $dsn = 'mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=a95vvd7g3ws694q7';
    $username = 'd02qifj9xiqsajpr';
    $password = 'xxi7tij7q7xathu1';

    try {
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }
