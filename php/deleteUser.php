<?php
require 'connexiondb.php';
$id = $_GET['userId'];


try{
    $sql = 'DELETE FROM user WHERE id = :id';
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = [
        'success' => true,
        'msg' => 'Suppression éffectué'
    ];
}catch(PDOException $e){
    echo $e->getMessage();
    $data = [
        'success' => false,
        'msg' => 'Une erreur est survenue'
    ];
}

echo json_encode($data);