<?php
require_once 'connexiondb.php';

try{

    $query = 'SELECT * FROM user';
    
    $stmt = $connection->query($query, PDO::FETCH_ASSOC);
    
    $rows = $stmt->fetchAll();
}catch(PDOException $e){
    echo $e->getMessage();
}


echo json_encode($rows);