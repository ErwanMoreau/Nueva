<?php 
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $id_rapport = $_GET['id_rapport'];
    $sql = $connexion->prepare('SELECT rapport.id_rapport,rapport.id_user, rapport.title, rapport.contenue,  user.nom, type.label, type.class FROM rapport, user, type where rapport.id_rapport= :id_rapport AND rapport.id_user = user.id_user AND rapport.id_type = type.id_type');
    $sql->bindValue(':id_rapport', $id_rapport,PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="customTitle"><button class="btn <?= $resultat['class'] ?> "><?= $resultat['label'] ?></button><?= $resultat['title'] ?></h1>
                    <!-- <h1 class="customTitle">Rapport d'arrestation de Lucien Myuer</h1> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="customTitleRapport">
                                Rapport: 
                            </h2>
                            <p><?= $resultat['contenue'] ?></p>
                           
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <span>Ecrit par : <?= $resultat['nom'] ?> </span>
                            <!-- <span>Ecrit par: <?php //echo  $resultat['nom'] ?> le <?php //echo $resultat['date'] ?></span> -->
                        </div>
                        <?php if($_SESSION['acces']['id_user'] === $resultat['id_user']):?>
                            <div class="col-md-8 customTAR">
                                <a href="index.php?id=13&id_rapport=<?= $_GET['id_rapport'] ?>" class="btn btn-primary"> Editer le rapport</a>
                                <a href="index.php?id=121&id_rapport=<?= $_GET['id_rapport'] ?>" class="btn btn-primary"> Suppprimer le rapport</a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>