<?php
// Connexion à la base de données
// nous utiliserons aussi les gestionaire d'erreur 


$dbname   = 'pannel';
$username = 'root';
$password = '';

try {

  
   $connexion = new PDO("mysql:host=localhost;charset=UTF8;dbname=".$dbname, $username, $password);

} catch (PDOException $error) {

    print "Erreur ! :" . "<br>".$error->getMessage().'<br>';
    die();
}

