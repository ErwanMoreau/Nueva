<?php

require 'bdd.php';
$freqL = strval(rand(30,75));
$freqBis = strval(rand(0,9));


$freq = (string)$freqL.'.'.$freqBis;
$id = 1;

$sql = $connexion->prepare('UPDATE frequence SET freqLongue= :freq WHERE id= :id');
$sql->bindValue(':freq', $freq, PDO::PARAM_STR);
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=3');