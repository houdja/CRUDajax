<?php

require 'connexiondb.php';

$success = '';
$error = '';

if(!empty($_POST['id']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])){
    $id = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        try{
            $sql = 'UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':first_name', $firstName, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $lastName, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $success = 'Modification éffectué';
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        $error = 'Adresse email incorrect';
    }
}else{
    $error = 'Veuillez remplir les champs';
}

$data = [
    'success' => $success,
    'error' => $error
];

echo json_encode($data);
