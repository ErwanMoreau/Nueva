<?php

require 'bdd.php';

$contenue = $_POST['information'];
var_dump($contenue);

if(isset($_POST) && !empty($_POST)){

    $sql = $connexion->prepare('INSERT INTO information (description) VALUES (:contenue)');
    $sql->bindValue(':contenue', $contenue, PDO::PARAM_STR);
    $sql->execute();
    var_dump($sql);

    header('Location: index.php?id=3');
} else {
    header('Location: index.php?id=3');
}