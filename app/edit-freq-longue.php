<?php

require 'bdd.php';
$freqC = strval(rand(31,87));
$freqBis = strval(rand(0,9));

date_default_timezone_set('Europe/Paris');
$modif = date('H:i / d-m-Y');

if ($freqC === '30' || $freqC === '31' || $freqC === '50') {
    $freq = '32.'.$freqBis;
} else {
    $freq = (string)$freqC.'.'.$freqBis;
}

$id = 1;

$sql = $connexion->prepare('UPDATE frequence SET freqLongue= :freq, dateLongue = :date WHERE id_frequence= :id');
$sql->bindValue(':freq', $freq, PDO::PARAM_STR);
$sql->bindValue(':date', $modif, PDO::PARAM_STR);
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=3');
