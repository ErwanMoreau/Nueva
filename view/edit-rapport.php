<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM type');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['id_rapport'];
    $rapport = $connexion->prepare('SELECT * FROM rapport WHERE id_rapport= :id');
    $rapport->bindValue(':id', $id, PDO::PARAM_INT);
    $rapport->execute();
    $resultatRapport = $rapport->fetch(PDO::FETCH_ASSOC);
?>
 <script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<div class="container-fluid mt-3">
  <form action="index.php?id=120" method="POST">
    <div class="card">
      <div class="card-header">
        <div class="row mb-3">
          <div class="col-md-12">
            <h1 class="customTitle">Ajout d'un rapport</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
              </div>
              <input type="text" name="title" value="<?= $resultatRapport['title'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Type de rapport</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="id_type">
                <option selected>Choose...</option>
                <?php foreach ($resultat as $key): ?>
                <option value="<?= $key['id'] ?>" <?php if($key['id_type'] === $resultatRapport['id_type']):?> selected <?php endif; ?>  > <?= $key['label'] ?> </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <textarea name="editor"  style="min-width: 1920px!important; min-height: 500px;">
        <?= $resultatRapport['contenue'] ?>
        </textarea><br />
      </div>
      <div class="card-footer">
        <div class="col-md-12">
            <input type="hidden" name="id" value="<?= $_GET['id_rapport'] ?>"> 
            <button class="btn btn-primary">Ajouter le Rapport</button>
        </div>
      </div>
    </div>
  </form>
</div>

