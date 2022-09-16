<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=crudajax;host=127.0.0.1';
$user = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
];

try{
    $connection = new PDO($dsn, $user, $password, $options);
}catch(PDOException $e){
    echo $e->getMessage();
}

?>