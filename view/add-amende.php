<?php
if( !isset($_SESSION['acces+'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM category');
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
                                    <option value="<?= $key['id_category'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>   
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Catégory</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                    <select name="classification" class="custom-select" id="inputGroupSelect02">
                                        <option value="Mineure">Mineure</option>
                                        <option value="Majeure">Majeure</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Classification</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" name="Infraction" class="form-control" placeholder="Conduite d'un véhicule immobilisé" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Infraction</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" name="contravention" class="form-control" placeholder="10000" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">contravention</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" name="complement" class="form-control" placeholder="Suspension du permis 4 h" aria-label="Contravention de Classe 1" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Complement</button>
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