<?php
require 'bdd.php';

    $casier = $_POST['id_casier'];
    $amende = $_POST['infraction'];

    $exist= $connexion->prepare('SELECT * FROM infraction WHERE id_casier= :casier AND id_amende= :amende ');
    $exist->bindValue(':casier', $casier,PDO::PARAM_INT);
    $exist->bindValue(':amende', $amende,PDO::PARAM_INT);
    $exist->execute();
    $resultatExist = $exist->fetch(PDO::FETCH_ASSOC);

    if(empty($resultatExist)) {

        $sql= $connexion->prepare('INSERT INTO infraction (id_casier, id_amende, total) VALUES(:casier, :amende, :total)');
        $sql->bindValue(':casier', $casier,PDO::PARAM_INT);
        $sql->bindValue(':amende', $amende,PDO::PARAM_INT);
        $sql->bindValue(':total', 1,PDO::PARAM_INT);
        $sql->execute();
        header('Location: index.php?id=9&id_casier='.$casier);
    } else {
        $total = $resultatExist['total'];
        $total++;
        $id = $resultatExist['id_infraction'];
        $sql= $connexion->prepare('UPDATE  infraction SET total= :total WHERE  id_infraction= :id');
        $sql->bindValue(':id', $id,PDO::PARAM_INT);
        $sql->bindValue(':total', $total,PDO::PARAM_INT);
        $sql->execute();
        header('Location: index.php?id=9&id_casier='.$casier);
    }