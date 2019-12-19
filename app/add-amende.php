<?php

    require 'bdd.php';
if( isset($_POST) & !empty($_POST)) {

    var_dump($_POST);
    $id_category = $_POST['id_category'];
    $label = $_POST['label'];
    $classification = $_POST['classification'];
    $sanction = $_POST['sanction'];
    $fichierPolice = $_POST['fichierPolice'];
    $casierJudiciaire = $_POST['casierJudiciaire'];

    $sql = $connexion->prepare('SELECT * FROM amende WHERE id_category= :id_category AND label= :label AND classification= :classification');
    $sql->bindValue(':id_category', $id_category, PDO::PARAM_INT);
    $sql->bindValue(':label', $label, PDO::PARAM_STR);
    $sql->bindValue(':classification', $classification, PDO::PARAM_STR);
    $sql->execute();
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);

    if (empty($resultat)){
       

        $add = $connexion->prepare('INSERT INTO amende (id_category, label, classification, sanction, fichierPolice, CasierJudiciaire) VALUES (:id_category, :label, :classification, :sanction, :fichierPolice, :casierJudiciaire)');
        $add->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        $add->bindValue(':label', $label, PDO::PARAM_STR);
        $add->bindValue(':classification', $classification, PDO::PARAM_STR);
        $add->bindValue(':sanction', $sanction, PDO::PARAM_STR);
        $add->bindValue(':fichierPolice', $fichierPolice, PDO::PARAM_STR);
        $add->bindValue(':casierJudiciaire', $casierJudiciaire, PDO::PARAM_STR);
        $add->execute();
        
        header('Location: index.php?id=15');
    } else {
        header('Location: index.php?id=15');
    }
} else {
    header('Location: index.php?id=15');
}