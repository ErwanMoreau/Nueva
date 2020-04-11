<?php 
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM type WHERE id_type BETWEEN 5 AND 8');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['id_dossier'];
    $get = $connexion->prepare('SELECT * FROM dossier WHERE id_dossier= :id');
    $get->bindValue(':id', $id, PDO::PARAM_INT);
    $get->execute();
    $resultatDossier = $get->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid mt-5">
    <div class="container">
        <div class="card">
            <form action="index.php?id=115" method="POST">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="customTitle">Editer un dossier</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <select name="id_type" class="custom-select" id="inputGroupSelect02">
                                    <option selected>Choose...</option>
                                <?php foreach ($resultat as $key):?>
                                    <option value="<?= $key['id_type'] ?>"<?php if($key['id_type'] === $resultatDossier['id_type']): ?> selected <?php endif ?>    ><?= $key['label'] ?></option>
                                <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Situation</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" value="<?= $resultatDossier['title'] ?>" name="title" class="form-control" placeholder="Dossier de Lucien Muyer" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Titre</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="customTitle">Contenue du Dossier:</h2>
                        </div>
                        <div class="col-md-12">
                            <textarea name="editor"  style="min-width: 100%!important; min-height: 300px;">
                                <?= $resultatDossier['contenue'] ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-12 customTAR">
                    <input type="hidden" name="id_dossier" value="<?= $id ?>">
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>