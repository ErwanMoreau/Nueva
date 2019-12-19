<?php

require 'bdd.php';
$freqC = strval(rand(30,512));
$freqBis = strval(rand(0,9));

$modif = date('d-m-Y H:i');


$freq = (string)$freqC.'.'.$freqBis;
$id = 1;

$sql = $connexion->prepare('UPDATE frequence SET freqCourte= :freq WHERE id= :id');
$sql->bindValue(':freq', $freq, PDO::PARAM_STR);
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=3');