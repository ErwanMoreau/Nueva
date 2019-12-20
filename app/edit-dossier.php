<?php

    require 'bdd.php';

if( isset($_POST) & !empty($_POST)) {

    $id_type = $_POST['id_type'];
    $title = $_POST['title'];
    $contenue = $_POST['editor'];
    $dossier = $_POST['id_dossier'];

    $sql = $connexion->prepare('UPDATE dossier SET  title= :title, contenue= :contenue, id_type= :id_type WHERE id= :id_dossier');
    $sql->bindValue(':title', $title, PDO::PARAM_STR);
    $sql->bindValue(':contenue', $contenue, PDO::PARAM_STR);
    $sql->bindValue(':id_type', $id_type, PDO::PARAM_INT);
    $sql->bindValue(':id_dossier', $dossier, PDO::PARAM_INT);
    $sql->execute();
    
    header('Location: index.php?id=21');
} else {
    header('Location: index.php?id=21');
}