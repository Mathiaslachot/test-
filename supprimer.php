<?php
require_once __DIR__."/conf.php";
require_once APP_DIR_INC."connect.php";

if(!isset($_GET['id'])){
    die('L\'id pas spécifiée!');
}
$sql = "DELETE FROM
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
header('Location: index.php');
die();
