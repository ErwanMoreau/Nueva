<?php 

    require 'bdd.php';

    $id= $_POST['id_user'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $matricule = $_POST['matricule'];
    $grade = $_POST['id_grade'];

    var_dump($id, $nom, $prenom, $email, $matricule, $grade);

    $sql = $connexion->prepare('UPDATE  user SET  nom=:nom, prenom= :prenom, email = :email, matricule= :matricule,  id_grade= :id_grade WHERE id_user= :id');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->bindValue(':matricule', $matricule, PDO::PARAM_STR);
    $sql->bindValue(':id_grade', $grade, PDO::PARAM_INT);
    $sql->execute();

    header('Location: index.php?id=5' );


