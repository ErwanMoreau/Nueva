<?php

require 'bdd.php';

$contenue = $_POST['information'];

date_default_timezone_set('Europe/Paris');
$modif = date('Y-m-d');
if(isset($_POST) && !empty($_POST)){

    $sql = $connexion->prepare('INSERT INTO information (description, date) VALUES (:contenue, :date)');
    $sql->bindValue(':contenue', $contenue, PDO::PARAM_STR);
    $sql->bindValue(':date', $modif, PDO::PARAM_STR);
    $sql->execute();
    // var_dump($sql);

    header('Location: index.php?id=3');
} else {
    header('Location: index.php?id=3');
}