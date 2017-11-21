<?php

require_once __DIR__."/conf.php";
require_once APP_DIR_INC."connect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $sql = "INSERT INTO `utilisateur`(`nom`, `email`) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->execute();
    if($stmt->errorCode() !== '00000'){
        die($stmt->errorInfo()[2]);
    }
    header('Location: index.php');
    die();
    d
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout de personne</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>Ajout de personne</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <p>
        <label for="nom">nom</label><br>
        <input type="text" name="nom" placeholder="nom" id="nom">
    </p>
    <p
    <p>
        <label for="email">email</label><br>
        <input type="email" name="email" placeholder="email" id="email">
    </p>

    <p><input type="submit" value="Ajouter" class="button_crud2" ></p>
</form>
</body>
</html>