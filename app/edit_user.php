<?php 

require 'bdd.php';
$id= $_GET['id_user'];

$sql = $connexion->prepare('UPDATE  user SET  nom=:nom, prenom= :prenom, email = :email, password= :password, matricule= :matricule,  id_grade= :id_grade WHERE id= :id');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->bindValue(':nom', $nom, PDO::PARAM_STR);
$sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$sql->bindValue(':email', $email, PDO::PARAM_STR);
$sql->bindValue(':password', $password, PDO::PARAM_STR);
$sql->bindValue(':matricule', $matricule, PDO::PARAM_STR);
$sql->bindValue(':id_grade', $grade, PDO::PARAM_INT);

$edit->execute();
$resultatedit= $edit->fetch();

if($edit){
    header('Location: index.php?id=10' );
    
}else{
    header('Location: index.php?id=id=10&error=10' );
}
