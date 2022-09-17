<?php

require_once 'php/connexiondb.php';

try{
    $sql = 'SELECT * FROM user WHERE id = :userID';
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':userID', $_GET['userId'], PDO::PARAM_INT);
    $stmt->execute();
    
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e->getMessage();
}

