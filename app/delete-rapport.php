<?php

    require 'bdd.php';

    $id = $_GET['id_rapport'];
    $sql = $connexion->prepare('UPDATE rapport SET isDelete = 1 WHERE id_rapport= :id ');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    header('Location: index.php?id=14');