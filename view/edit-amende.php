<?php
    if( !isset($_SESSION['acces+'])){
        header('Location: index.php?id=1');
    }
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM category WHERE id ');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['id_amende'];
    $edit = $connexion->prepare('SELECT * FROM amende WHERE id= :id');
    $edit->bindValue(':id', $id, PDO::PARAM_INT);
    $edit->execute();
    $resultatAmende = $edit->fetch(PDO::FETCH_ASSOC);
    
?>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="card">
            <form action="index.php?id=112" method="POST">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="customTitle">Editer une amende</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <select name="id_category" class="custom-select" id="inputGroupSelect02">
                                    <option >Choose...</option>
                                <?php foreach ($resultat as $key):?>
                                    <option value="<?= $key['id'] ?>" <?php if($key['id'] === $resultatAmende['id_category'] ): ?> selected <?php endif ?>><?= $key['label'] ?></option>
                                <?php endforeach ?>   
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Catégory</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="label" value="<?= $resultatAmende['label'] ?>" class="form-control" placeholder="Exces de Vitesse, etc.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Infraction</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="classification" value="<?= $resultatAmende['classification'] ?>" class="form-control" placeholder="Contravention de Classe 1" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Classification</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="sanction" value="<?= $resultatAmende['sanction'] ?>" class="form-control" placeholder="1h de TIG, 48h de garde a vue" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Sanction</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="customTitle">Inscrit dans le:</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="fichierPolice" value="<?= $resultatAmende['fichierPolice'] ?>" class="form-control" placeholder="Oui / Non" aria-label="Contravention de Classe 1" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">fichier police</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="casierJudiciaire" value="<?= $resultatAmende['CasierJudiciaire'] ?>" class="form-control" placeholder="Oui / Non" aria-label="1h de TIG, 48h de garde a vue" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Casier Judiciaire</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer customTAR">
                <input type="hidden" value="<?= $resultatAmende['id']  ?>" name="id">
                    <button type="submit" class="btn btn-outline-primary">Editer l'amende</button>
                </div>
            </form>
            <a href="index.php?id=113&id_amende=<?=$resultatAmende['id'] ?>" class="btn btn-danger ">Suprimer l'amende</a>
        </div>
    </div>
</div>