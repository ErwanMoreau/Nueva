<?php 

require 'bdd.php';

   

    if (isset($_GET['id_info']) && !empty($_GET['id_info'])){

        $id= $_GET['id_info'];
    
        $sql = $connexion->prepare('UPDATE information set isDelete = 1 WHERE id= :id ');
        $sql->bindValue(':id', $id, PDO::PARAM_INT );
        $sql->execute();
    

        header('Location: index.php?id=3');
    } else {
        header('Location: index.php?id=3');
    }