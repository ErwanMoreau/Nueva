<?php 

    require 'bdd.php';

    $id= $_GET['id_dossier'];
    $sql = $connexion->prepare('DELETE FROM dossier WHERE id= :id');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    header('Location: index.php?id=21');