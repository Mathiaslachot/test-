<?php

require_once __DIR__."/conf.php";
require_once APP_DIR_INC."connect.php";

$sql = "SELECT `id`, `nom`, `email` FROM `utilisateur`;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if ($stmt->errorCode() !== "00000") {
    die($stmt->errorInfo()[2]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<table>
<?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?=$row['nom']?></td>
        <td><a href="supprimer.php?id=<?=$row['id']?>" class="button_crud1">Supprimer</a></td>
        <td><a href="consulter.php?id=<?=$row['id']?>" class="button_crud">Consulter</a></td>

    </tr>
<?php endwhile; ?>
</table>
<a href="ajouter.php?id=<?=$row['id']?>" class="button_crud2" >ajouter article</a>

</html>
