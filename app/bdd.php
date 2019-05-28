<?php
// Connexion à la base de données
// nous utiliserons aussi les gestinnaire d'erreur 
//c'est une bonne pratique d'utiliser le try et catch 

$dbname   = 'nueva';
$username = 'root';
$password = '';

try {

   // PDO est un objet qui prend 3 parametres minimum
   $connexion = new PDO("mysql:host=localhost;charset=UTF8;dbname=".$dbname, $username, $password);

} catch (PDOException $error) {

    print "Erreur ! :" . "<br>".$error->getMessage().'<br>';
    die();
}

