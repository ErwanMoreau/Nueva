<?php
require_once 'bdd.php';
$pseudo=$_POST['pseudo_user'];
$info=$_POST['info'];
$somme=$_POST['somme'];
$chest = 1;

$edit_transaction = $connexion->prepare('UPDATE  Nueva_transaction SET user_pseudo =:pseudo, description = :description, value = :value, chest= :chest');
$edit_transaction->bindvalue(':pseudo',$pseudo,PDO::PARAM_STR);
$edit_transaction->bindvalue(':description',$info,PDO::PARAM_STR);
$edit_transaction->bindvalue(':value',$somme,PDO::PARAM_STR);
$edit_transaction->bindvalue(':chest',$chest,PDO::PARAM_STR);

$edit_transaction->execute();

if($edit_transaction){
    header('Location: index.php?id=10&error=1');
}else{
    header('Location: index.php?id=10&error=2');
}
