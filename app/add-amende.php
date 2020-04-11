<?php

    require 'bdd.php';
if( isset($_POST) & !empty($_POST)) {

    var_dump($_POST);
    $id_category = $_POST['id_category'];
    $infraction = $_POST['Infraction'];
    $classification = $_POST['classification'];
    $contravention = $_POST['contravention'];
    $complement = $_POST['complement'];
   

    $sql = $connexion->prepare('SELECT * FROM amende WHERE id_category = :id_category AND infraction= :infraction AND classification= :classification AND complement = :complement');
    $sql->bindValue(':id_category', $id_category, PDO::PARAM_INT);
    $sql->bindValue(':infraction', $infraction, PDO::PARAM_STR);
    $sql->bindValue(':classification', $classification, PDO::PARAM_STR);
    $sql->bindValue(':complement', $complement, PDO::PARAM_STR);
    $sql->execute();
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);

    if (empty($resultat)){
       

        $add = $connexion->prepare('INSERT INTO amende (id_category, infraction, classification, contravention, complement) VALUES (:id_category, :infraction, :classification, :contravention, :complement)');
        $add->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        $add->bindValue(':infraction', $infraction, PDO::PARAM_STR);
        $add->bindValue(':classification', $classification, PDO::PARAM_STR);
        $add->bindValue(':contravention', $contravention, PDO::PARAM_STR);
        $add->bindValue(':complement', $complement, PDO::PARAM_STR);
        $add->execute();
        
        // header('Location: index.php?id=15');
    } else {
        // header('Location: index.php?id=15');
    }
} else {
    // header('Location: index.php?id=15');
}