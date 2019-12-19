<?php 

require 'bdd.php';

$id = $_GET['id_amende'];

$sql = $connexion->prepare('DELETE FROM amende WHERE id= :id');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=15');