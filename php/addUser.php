<?php
require 'connexiondb.php';
$success = '';
$error = '';

if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])){
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        try{
            $sql = "INSERT INTO user (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':first_name', $firstName, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $lastName, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $success = 'Utilisateur enregistré';
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{  
        $error = 'Veuillez renseigner un email valide.';
    }
}else{
    $error = 'Veuillez remplir les champs';
}

$data = [
    'success' => $success,
    'error' => $error
];

echo json_encode($data);