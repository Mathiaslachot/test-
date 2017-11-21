<?php

require_once __DIR__."/conf.php";
require_once APP_DIR_INC."connect.php";

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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulter</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<a href="ajouter.php" class="button_crud2">Ajouter</a>
<table>
    <tr>
        <td>Nom</td>
        <td>Email</td>
    </tr>
    <?php
    $row = $stmt->fetch(PDO::FETCH_ASSOC)
        ?>
        <tr>
            <td><?=$row['nom']?></td>
            <td><?=$row['email']?></td>
            <td>
                <a href="index.php" class="button_crud" >Accueil</a>
                <a href="supprimer.php?id=<?=$row['id']?>" class="button_crud1" >Supprimer</a>
            </td>
        </tr>
        <?php

    ?>
</table>