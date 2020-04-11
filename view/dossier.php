<?php 
    require './app/bdd.php';
    $id = $_GET['id_dossier'];
    $sql = $connexion->prepare('SELECT dossier.id, dossier.title, dossier.contenue, dossier.date, dossier.id_user, user.nom, type.label, type.class FROM dossier,type,user WHERE dossier.id_type = type.id AND dossier.id_user = user.id_user AND dossier.id_dossier= :id');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn <?= $resultat['class'] ?>"><?= $resultat['label'] ?></button>
                    </div>
                    
                    <div class="col-md-10">
                        <h1 class="customTitle"><?= $resultat['title'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $resultat['contenue'] ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        <p>Dossier de: <?= $resultat['nom'] ?> Le <?= $resultat['date'] ?></p>
                    </div>
                    <?php if($_SESSION['acces']['id_user'] === $resultat['id_user']): ?>
                        <div class="col-md-8 customTAR">
                            <a class="btn btn-primary" href="index.php?id=20&id_dossier=<?= $resultat['id_dossier'] ?>">Editer</a>
                            <a class="btn btn-danger" href="index.php?id=116&id_dossier=<?= $resultat['id_dossier'] ?>">Supprimer</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>