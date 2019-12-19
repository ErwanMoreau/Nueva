<?php
if( !isset($_SESSION['acces+'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM type WHERE id BETWEEN 1 AND 4 ');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="card">
            <form action="index.php?id=111" method="POST">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="customTitle">Ajouter une amende</h1>
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
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>   
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Catégory</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="label" class="form-control" placeholder="Exces de Vitesse, etc.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Infraction</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="classification" class="form-control" placeholder="Contravention de Classe 1" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Classification</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="sanction" class="form-control" placeholder="1h de TIG, 48h de garde a vue" aria-label="" aria-describedby="button-addon2">
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
                                <input type="text" name="fichierPolice" class="form-control" placeholder="Oui / Non" aria-label="Contravention de Classe 1" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">fichier police</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="casierJudiciaire" class="form-control" placeholder="Oui / Non" aria-label="1h de TIG, 48h de garde a vue" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Casier Judiciaire</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer customTAR">
                    <button type="submit" class="btn btn-outline-primary">Ajouter l'amende</button>
                </div>
            </form>
        </div>
    </div>
</div>