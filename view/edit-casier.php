<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
$id = $_GET['id_casier'];
$sql = $connexion->prepare('SELECT * FROM casier WHERE id= :id');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$resultat = $sql->fetch(PDO::FETCH_ASSOC);
?>
 <script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<div class="container-fluid mt-5">
  <div class="container">
    <form action="index.php?id=106" method="POST">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Edit Casier</h1>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="firstname">Prénom</span>
                </div>
                <input type="text" value="<?= $resultat['prenom'] ?>" class="form-control" name="prenom" placeholder="prénom" aria-label="firstname" aria-describedby="firstname" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="lastname">Nom</span>
                </div>
                <input type="text" value="<?= $resultat['nom'] ?>" class="form-control" name="nom" placeholder="nom" aria-label="lastname" aria-describedby="lastname" required>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button (click)="generate()" class="btn btn-outline-primary" type="button" id="numerosCasier">Numéros de Casier</button>
                </div>
                <input type="text" value="<?= $resultat['numero_de_casier'] ?>" id="numberCasier" name="number" class="form-control" placeholder="" aria-label="numerosCasier" aria-describedby="numerosCasier" readonly required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-telephone">Numéros de téléphone</span>
                </div>
                <input type="text" class="form-control" value="<?= $resultat['telephone'] ?>" name="telephone" placeholder="numéros de téléphone" aria-label="telephone" aria-describedby="addon-telephone">
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 ">
              <textarea name="editor"  style="min-width: 100%!important; min-height: 300px;">
              <?= $resultat['information'] ?>
              </textarea><br />
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12 customTAR">
                <input type="hidden" value="<?= $_GET['id_casier']?>" name="id_casier">
                <button type="submit" class="btn btn-primary ">Edit Casier</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
