<?php 

require 'bdd.php';


if( isset($_POST) && !empty($_POST)){

    $nom = strtolower($_POST['nom']);
    $prenom = strtolower($_POST['prenom']);

    $existe = $connexion->prepare('SELECT * FROM casier WHERE nom= :nom AND prenom= :prenom');
    $existe->bindValue(':nom', $nom, PDO::PARAM_STR);
    $existe->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $existe->execute();
    $resultat = $existe->fetch(PDO::FETCH_ASSOC);

    if(empty($resultat)){

        $casier = $_POST['number'];
        $telephone = $_POST['telephone'];
        $information = $_POST['editor'];   

        if ( empty($_POST['information'])){

            $sql= $connexion->prepare('INSERT INTO casier (nom, prenom, numeroCasier, telephone, information) VALUES(:nom, :prenom, :casier, :telephone, :information)');
            $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
            $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $sql->bindValue(':casier', $casier, PDO::PARAM_INT);
            $sql->bindValue(':telephone', $telephone, PDO::PARAM_INT);
            $sql->bindValue(':information', $information, PDO::PARAM_STR);
            $sql->execute();
            header('Location: index.php?id=22');
        } else {

            $sql= $connexion->prepare('INSERT INTO casier (nom, prenom, numeroCasier, telephone) VALUES(:nom, :prenom, :casier, :telephone)');
            $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
            $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $sql->bindValue(':casier', $casier, PDO::PARAM_INT);
            $sql->bindValue(':telephone', $telephone, PDO::PARAM_INT);
            $sql->execute();
            
            // header('Location: index.php?id=22');
        }
    } else {
        // header('Location: index.php?id=22');
    }

    
    

    
} else {
    // header('Location: index.php?id=22');
}