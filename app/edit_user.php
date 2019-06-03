<?php 

require 'bdd.php';
$id= $_GET['id_use'];

$edit = $connexion->prepare('UPDATE blog_user SET pseudo=:pseudo ,email=:email ,nom=:nom, prenom=:prenom ,birthday=:birthday ,statut=:statut WHERE id= :id');
$edit->bindvalue(':id',$id,PDO::PARAM_INT);
$edit->bindvalue(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
$edit->bindvalue(':email',$_POST['email'],PDO::PARAM_STR);
$edit->bindvalue(':nom',$_POST['lastname'],PDO::PARAM_STR);
$edit->bindvalue(':prenom',$_POST['firstname'],PDO::PARAM_STR);
$edit->bindvalue(':birthday',$_POST['birthday'],PDO::PARAM_STR);
$edit->bindvalue(':statut',$_POST['statut'],PDO::PARAM_INT);

$edit->execute();
$resultatedit= $edit->fetch();

if($edit){
    header('Location: index.php?id=10' );
    
}else{
    header('Location: index.php?id=id=10&error=10' );
}
