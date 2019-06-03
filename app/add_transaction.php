<?php
require_once 'bdd.php';
$pseudo=$_POST['pseudo_user'];
$info=$_POST['info'];
$somme=$_POST['somme'];
$chest = 1;

$add_transaction = $connexion->prepare('INSERT INTO Nueva_transaction(user_pseudo, description, value, chest) VALUES(:pseudo, :description, :value, :chest)');
$add_transaction->bindvalue(':pseudo',$pseudo,PDO::PARAM_STR);
$add_transaction->bindvalue(':description',$info,PDO::PARAM_STR);
$add_transaction->bindvalue(':value',$somme,PDO::PARAM_STR);
$add_transaction->bindvalue(':chest',$chest,PDO::PARAM_STR);

$add_transaction->execute();

if($add_transaction){
    header('Location: index.php?id=10&error=1');
}else{
    header('Location: index.php?id=10&error=2');
}
