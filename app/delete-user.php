<?php
require_once 'bdd.php';
$id=$_GET['id_user'];


$edit_transaction = $connexion->prepare('DELETE FROM user  WHERE id_user= :id');
$edit_transaction->bindvalue(':id',$id,PDO::PARAM_STR);


$edit_transaction->execute();

if($edit_transaction){
    header('Location: index.php?id=5');
}else{
    header('Location: index.php?id=5');
}
