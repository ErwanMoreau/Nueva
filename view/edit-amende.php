<?php
    if( !isset($_SESSION['acces+'])){
        header('Location: index.php?id=1');
    }
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM category WHERE id_category ');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['id_amende'];
    $edit = $connexion->prepare('SELECT * FROM amende WHERE id_amende = :id');
    $edit->bindValue(':id', $id, PDO::PARAM_INT);
    $edit->execute();
    $resultatAmende = $edit->fetch(PDO::FETCH_ASSOC);
    
?>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="card">
            <form action="index.php?id=111" method="POST">
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
                                    <option value="<?= $key['id_category'] ?>" <?php if($key['id_category'] === $resultatAmende['id_category'] ): ?> selected <?php endif ?>><?= $key['label'] ?></option>
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
                                        <option value="Mineure" <?php if($resultatAmende['classification'] == 'Mineure' ): ?> selected <?php endif ?> >Mineure</option>
                                        <option value="Majeure" <?php if($resultatAmende['classification'] == 'Majeure' ): ?> selected <?php endif ?> >Majeure</option>
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
                                <input type="text" name="Infraction" value="<?= $resultatAmende['infraction'] ?>" class="form-control" placeholder="Conduite d'un véhicule immobilisé" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Infraction</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" name="contravention"  value="<?= $resultatAmende['contravention'] ?>" class="form-control" placeholder="10000" aria-label="" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">contravention</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" name="complement" value="<?= $resultatAmende['complement'] ?>" class="form-control" placeholder="Suspension du permis 4 h" aria-label="Contravention de Classe 1" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Complement</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer customTAR">
                    <button type="submit" class="btn btn-outline-primary">Editer l'amende</button>
                </div>
            </form>
            <a href="index.php?id=113&id_amende=<?=$resultatAmende['id_amende'] ?>" class="btn btn-danger ">Suprimer l'amende</a>
        </div>
    </div>
</div>