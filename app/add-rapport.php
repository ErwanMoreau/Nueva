<?php

require 'bdd.php';

if(isset($_POST) && !empty($_POST)) {

    $title = $_POST['title'];
    $contenue = $_POST['editor'];
    $type = $_POST['id_type'];
    $auteur = $_POST['id'];

    $exist = $connexion->prepare('SELECT * FROM rapport WHERE title= :title AND id_type= :id_type ');
    $exist->bindValue(':title', $title, PDO::PARAM_STR);
    $exist->bindValue(':id_type', $type, PDO::PARAM_INT);
    $exist->execute();
    $resultat = $exist->fetch(PDO::FETCH_ASSOC);

    if(empty($resultat)){
        $sql = $connexion->prepare('INSERT INTO rapport (id_user, title, contenue, id_type) VALUES (:auteur, :title, :contenue, :id_type)');
        $sql->bindValue(':auteur', $auteur, PDO::PARAM_INT);
        $sql->bindValue(':title', $title, PDO::PARAM_STR);
        $sql->bindValue(':contenue', $contenue, PDO::PARAM_STR);
        $sql->bindValue(':id_type', $type, PDO::PARAM_INT);
        $sql->execute();

        header('Location:  index.php?id=14');
    } else {
        header('Location:  index.php?id=14');
    }


    header('Location:  index.php?id=14');
} else {
    header('Location:  index.php?id=14');
}