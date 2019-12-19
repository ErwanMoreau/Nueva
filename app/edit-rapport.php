<?php 
require 'bdd.php';

if(isset($_POST) && !empty($_POST)) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $contenue = $_POST['editor'];
    $type = $_POST['id_type'];


    var_dump($contenue, $title, $type);
    
    
        $sql = $connexion->prepare('UPDATE rapport SET title= :title, contenue= :contenue, id_type= :id_type WHERE id= :id');
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':title', $title, PDO::PARAM_STR);
        $sql->bindValue(':contenue', $contenue, PDO::PARAM_STR);
        $sql->bindValue(':id_type', $type, PDO::PARAM_INT);
        $sql->execute();


   header('Location:  index.php?id=14');
} else {
   header('Location:  index.php?id=14');
}


   
