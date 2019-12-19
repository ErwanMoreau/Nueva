<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM type');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
 <script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<div class="container-fluid mt-3">
  <form action="index.php?id=119" method="POST">
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
              <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
                <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
      <textarea name="editor" style="width: 100%; min-height: 500px;">
      </textarea><br />
      </div>
      <div class="card-footer">
        <div class="col-md-12">
            <input type="hidden" name="id" value="<?= $_SESSION['acces']['id_user'] ?>"> 
            <button class="btn btn-primary">Ajouter le Rapport</button>
        </div>
      </div>
    </div>
  </form>
</div>

