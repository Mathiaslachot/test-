
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mlachot_eemi_201707_1a4','mlachot','58ne5b9T73');
    $pdo->exec('SET NAMES UTF8');
} catch (PDOException $exception) {
    die($exception->getMessage());
}