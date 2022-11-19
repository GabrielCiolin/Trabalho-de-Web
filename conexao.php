<?php

session_start();

$localhost = "localhost";
$user = "root";
$password = "";
$db = "sistema";


global $pdo;

try {

    //orientada a objetos com pdo
    // $pdo = new PDO("mysql:dbname=".$db."; host=".$localhost);//, $user, $password);
    $pdo = new PDO("mysql:dbname=".$db."; host=".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "ERRO: " .$e->getMessage();
    exit;
}






?>