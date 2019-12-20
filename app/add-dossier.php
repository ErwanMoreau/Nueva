<?php

    require 'bdd.php';

if( isset($_POST) & !empty($_POST)) {

    $id_type = $_POST['id_type'];
    $title = $_POST['title'];
    $contenue = $_POST['editor'];
    $auteur = $_POST['id_user'];
    $date = date('d-m-Y H:i');

    $sql = $connexion->prepare('SELECT * FROM dossier WHERE id_type= :id_type AND title= :title');
    $sql->bindValue(':id_type', $id_type, PDO::PARAM_INT);
    $sql->bindValue(':title', $title, PDO::PARAM_STR);
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(empty($resultat)){

        $add = $connexion->prepare('INSERT INTO dossier(title, contenue, id_type, id_user, date) VALUES (:title, :contenue, :id_type, :id_auteur, :date)');
        $add->bindValue(':title', $title, PDO::PARAM_STR);
        $add->bindValue(':contenue', $contenue, PDO::PARAM_STR);
        $add->bindValue(':id_type', $id_type, PDO::PARAM_INT);
        $add->bindValue(':id_auteur', $auteur, PDO::PARAM_INT);
        $add->bindValue(':date', $date , PDO::PARAM_STR);
        $add->execute();
        header('Location: index.php?id=21');
    } else {
        header('Location: index.php?id=21');
    }

} else {
    header('Location: index.php?id=21');
}