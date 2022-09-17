<?php require_once 'php/get__userInfo.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <div class="container">
        <a href="index.html">Accueil</a>
        <form class="edit__form">
            <h1>Modifier un utilisateur</h1>
            <input type="hidden" name="id" value="<?=$userInfo['id']?>">
            <input type="text" placeholder="First name" name="first_name" value="<?=$userInfo['first_name']?>"required>
            <input type="text" placeholder="Last name" name="last_name" value="<?=$userInfo['last_name']?>"required>
            <input type="email" placeholder="Email" name="email" value="<?=$userInfo['email']?>" required>
            <button type="submit">Soumettre</button>
        </form>
    </div>
    <script src="js/edit.js"></script>
</body>
</html>