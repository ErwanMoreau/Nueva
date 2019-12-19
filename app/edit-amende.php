<?php

    require 'bdd.php';
if( isset($_POST) & !empty($_POST)) {

    $id = $_POST['id'];
    $id_category = $_POST['id_category'];
    $label = $_POST['label'];
    $classification = $_POST['classification'];
    $sanction = $_POST['sanction'];
    $fichierPolice = $_POST['fichierPolice'];
    $casierJudiciaire = $_POST['casierJudiciaire'];

    $add = $connexion->prepare('UPDATE amende  SET id_category= :id_category, label= :label, classification= :classification, sanction= :sanction, fichierPolice= :fichierPolice, CasierJudiciaire= :CasierJudiciaire WHERE id= :id');
    $add->bindValue(':id', $id, PDO::PARAM_INT);
    $add->bindValue(':id_category', $id_category, PDO::PARAM_INT);
    $add->bindValue(':label', $label, PDO::PARAM_STR);
    $add->bindValue(':classification', $classification, PDO::PARAM_STR);
    $add->bindValue(':sanction', $sanction, PDO::PARAM_STR);
    $add->bindValue(':fichierPolice', $fichierPolice, PDO::PARAM_STR);
    $add->bindValue(':CasierJudiciaire', $casierJudiciaire, PDO::PARAM_STR);
    $add->execute();
        
    header('Location: index.php?id=15');
  
} else {
    header('Location: index.php?id=15');
}