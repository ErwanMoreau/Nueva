<?php 

require 'bdd.php';

$id = $_GET['id_amende'];

$sql = $connexion->prepare('UPDATE amende SET isDelete = 1 WHERE id_amende= :id');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=15');