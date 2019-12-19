<?php

require 'bdd.php';


if( isset($_POST) && !empty($_POST)){
    $id = $_POST['id_casier'];
    $nom = strtolower($_POST['nom']);
    $prenom = strtolower($_POST['prenom']);
    $casier = $_POST['number'];
    $telephone = $_POST['telephone'];
    $information = $_POST['editor'];   

        if ( empty($_POST['information'])){

            $sql= $connexion->prepare('UPDATE casier SET nom= :nom, prenom= :prenom, numero_de_casier= :casier, telephone = :telephone, information= :information WHERE id= :id');
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
            $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $sql->bindValue(':casier', $casier, PDO::PARAM_INT);
            $sql->bindValue(':telephone', $telephone, PDO::PARAM_INT);
            $sql->bindValue(':information', $information, PDO::PARAM_STR);
            $sql->execute();
            header('Location: index.php?id=22');
        } else {

            $sql= $connexion->prepare('UPDATE casier SET nom= :nom, prenom= :prenom, numero_de_casier= :casier, telephone = :telephone WHERE id= :id');
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
            $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $sql->bindValue(':casier', $casier, PDO::PARAM_INT);
            $sql->bindValue(':telephone', $telephone, PDO::PARAM_INT);
            $sql->execute();
            
            header('Location: index.php?id=22');
        }

} else {
    header('Location: index.php?id=22');
}