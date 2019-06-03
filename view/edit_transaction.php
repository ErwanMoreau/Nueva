<?php  if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1&error=3');
    require_once 'bdd.php';
    $edit_transaction = $connexion->prepare('SELECT * FROM Nueva_transaction WHERE id=:id');
    $edit_transaction->bindvalue(':id',$_GET['id_tran'],PDO::PARAM_INT);
    $edit_transaction->execute();
    $resultat = $edit_transaction->fetch();

} ?>

<div class="container-fluid ">
    <div class="container">
        <div class="row est-mt">
            <div class="col-md-12">
                <h1>Edité d'une Transaction</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Cette Page vous permet d'ajouter une transaction au compte Famille il vous suffit de renter dans le premier champ les informations sur la transaction <br>
                 et dans le deuxième champ la somme de la transaction soit un chiffre positif pour un ajout d'argent soit négative pour un retrait du compte </p>
            </div>
        </div>





        <form action='index.php?id=102 ' method='POST'>
            <div class="form-row mt-5">
                <div class="form-group col-md-12">
                    <label for="inputinfo">Informations</label>
                    <input type="text" class="form-control" id="inputinfo" name='info' placeholder="Informations sur la Transaction" value='<?= $resultat['description'] ?>'>
                    <input type="hidden"   name='pseudo_user' value='<?=$user['pseudo'] ?>'>
                </div>
            </div>
            
            <div class="form-row mt-5">
                <div class="form-group col-md-12">
                    <label for="inputsomme">Somme</label>
                    <input type="text" class="form-control" id="inputsomme" name='somme' placeholder="Somme de La transaction" value='<?= $resultat['description'] ?>'>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-5">Modifié</button>
            </div>
            
        </form>
    </div>
</div>