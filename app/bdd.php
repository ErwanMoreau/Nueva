<?php
// Connexion à la base de données
// nous utiliserons aussi les gestionaire d'erreur 


$dbname   = 'police_malden';
$username = 'police_root';
$password = 'fPz9g5_6';

// $dbname   = 'base';
// $username = 'root';
// $password = '';

try {

  
   $connexion = new PDO("mysql:host=localhost;charset=UTF8;dbname=".$dbname, $username, $password);

} catch (PDOException $error) {

    print "Erreur ! :" . "<br>".$error->getMessage().'<br>';
    die();
}

