<?php

    require 'bdd.php';

    $id = $_GET['id_rapport'];
    $sql = $connexion->prepare('DELETE FROM rapport WHERE id= :id ');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    header('Location: index.php?id=14');