<?php 

    require 'bdd.php';

    $id= $_GET['id_dossier'];
    $sql = $connexion->prepare('UPDATE dossier SET isDelete = 1 WHERE id_dossier= :id');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    header('Location: index.php?id=21');