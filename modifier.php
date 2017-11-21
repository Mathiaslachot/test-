<?php

require_once __DIR__."/conf.php";
require_once APP_DIR_INC."connect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "UPDATE `utilisateur` SET nom = :nom, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    if($stmt->errorCode() !== '00000'){
        die($stmt->errorInfo()[2]);
    }
    header('Location: index.php');
    die();
}

if(!isset($_GET['id'])){
    die('L\'id pas spécifiée!');
}

$sql = "SELECT
  `id`,
  `nom`,
  `email`
FROM
  `utilisateur`
WHERE
  id = :id
";




$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();

if($stmt->errorCode() !== '00000'){
    die($stmt->errorInfo()[2]);
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(false === $row){
    die('L\'id n\'existe pas!');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>Modifier</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <p>
        <label for="nom">nom</label><br>
        <input type="text" name="nom" placeholder="nom" id="nom" value="<?=$row['nom']?>">
    </p>
    <p>
        <label for="email">email</label><br>
        <input type="email" name="email" placeholder="email" id="email" value="<?=$row['email']?>">
    </p>
    <p><input type="submit" value="Modifier" class="button_crud"></p>
</form>
</body>
</html>