<?php

require 'bdd.php';
$freqC = rand(31,511);

date_default_timezone_set('Europe/Paris');
$modif = date('H:i / d-m-Y');

if ($freqC === '30' || $freqC === '31' || $freqC === '50') {
    $freq = 36;
} else {
    $freq = (string)$freqC;
}
var_dump($freq);
$id = 1;

$sql = $connexion->prepare('UPDATE frequence SET freqCourte= :freq, dateCourte = :date WHERE id_frequence= :id');
$sql->bindValue(':freq', $freq, PDO::PARAM_STR);
$sql->bindValue(':date', $modif, PDO::PARAM_STR);
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php?id=3');


