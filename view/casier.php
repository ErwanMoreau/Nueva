<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $id= $_GET['id_casier'];
    $casier = $connexion->prepare('SELECT * FROM casier where id_casier= :id');
    $casier->bindValue(':id', $id, PDO::PARAM_INT);
    $casier->execute();
    $resultatCasier = $casier->fetch(PDO::FETCH_ASSOC);


    // $Code = $connexion->prepare('SELECT * FROM infraction where id_casier= :id AND id_type= :id_type');
    // $Code->bindValue(':id', $id, PDO::PARAM_INT);
    // $Code->bindValue(':id_type', 1, PDO::PARAM_INT);

    $civil = $connexion->prepare('SELECT infraction.total, amende.infraction FROM infraction, amende,casier where infraction.id_amende = amende.id_amende AND infraction.id_casier = casier.id_casier AND amende.id_category = 1 AND infraction.id_casier = :id');
    $civil->bindValue(':id', $id, PDO::PARAM_INT);
    $civil->execute();
    $resultatCivil = $civil->fetchAll(PDO::FETCH_ASSOC);

    $justice = $connexion->prepare('SELECT infraction.total, amende.infraction FROM infraction, amende,casier where infraction.id_amende = amende.id_amende AND infraction.id_casier = casier.id_casier AND amende.id_category = 2 AND infraction.id_casier = :id');
    $justice->bindValue(':id', $id, PDO::PARAM_INT);
    $justice->execute();
    $resultatJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

    $travail = $connexion->prepare('SELECT infraction.total, amende.infraction FROM infraction, amende,casier where infraction.id_amende = amende.id_amende AND infraction.id_casier = casier.id_casier AND amende.id_category = 3 AND infraction.id_casier = :id');
    $travail->bindValue(':id', $id, PDO::PARAM_INT);
    $travail->execute();
    $resultatTravail = $travail->fetchAll(PDO::FETCH_ASSOC);

    $procedure = $connexion->prepare('SELECT infraction.total, amende.infraction FROM infraction, amende,casier where infraction.id_amende = amende.id_amende AND infraction.id_casier = casier.id_casier AND amende.id_category = 4 AND infraction.id_casier = :id');
    $procedure->bindValue(':id', $id, PDO::PARAM_INT);
    $procedure->execute();
    $resultatProcedure = $procedure->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-header">
      <!-- Identity -->
      <div class="row">
        <div class="col-md-3 customTAC">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Prénom : </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- <h1>{{ Prenom  }}</h1> -->
              <h1 class="customTitleCardBis"> <?= $resultatCasier['prenom'] ?> </h1>
            </div>
          </div>
        </div>
        <div class="col-md-3 customTAC">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Nom : </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- <h1>{{ Prenom  }}</h1> -->
              <h1 class="customTitleCardBis"> <?= $resultatCasier['nom'] ?> </h1>
            </div>
          </div>
        </div>
        <div class="col-md-3 customTAC">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Téléphone : </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- <h1>{{ Prenom  }}</h1> -->
              <h1 class="customTitleCardBis"> <?= $resultatCasier['telephone'] ?> </h1>
            </div>
          </div>
        </div>
        <div class="col-md-3 customTAC">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Numéros de Casier : </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- <h1>{{ Prenom  }}</h1> -->
              <h1 class="customTitleCardBis"> <?= $resultatCasier['numeroCasier'] ?> </h1>
            </div>
          </div>
        </div>
      </div>
      <!-- Informations de la personnes -->
      <div class="row mt-4">
        <div class="col-md-12">
          <h1 class="customTitleCard">Informations Concernant la Personne:</h1>
        </div>
      </div>
      <!-- Informations de la personnes -->
      <div class="row">
       <div class="col-md-12">
            <p><?= $resultatCasier['information'] ?></p>
       </div>
       <div class="col-md-12 customTAR">
        <a class="customLinkBis" href="index.php?id=8&id_casier=<?= $resultatCasier['id_casier']  ?>">Editer le casier</a>
       </div>
      </div>
    </div>
    <div class="card-body">
      <!--Crimes et delits -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Code Civil</h1>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatCivil as $key): ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['infraction']?>
                        <span class="badge badge-primary badge-pill"><?= $key['total']?></span>
                      </li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-4">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Code de justice administrative</h1>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatJustice as $key): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['infraction']?>
                            <span class="badge badge-primary badge-pill"><?= $key['total']?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <h1 class="customTitleCard">code de protection du travailleur:</h1>
        </div>
        <div class="col-md-6">
          <h1 class="customTitleCard">Code de procédure:</h1>
        </div>
        <!-- Infraction Code de la Route -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatTravail as $key): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['infraction']?>
                            <span class="badge badge-primary badge-pill"><?= $key['total']?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatProcedure as $key): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['infraction']?>
                            <span class="badge badge-primary badge-pill"><?= $key['total']?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
$code = $connexion->prepare('SELECT * FROM amende WHERE id_category = 1');
$code->execute();
$resultatAmendeCivil = $code->fetchAll(PDO::FETCH_ASSOC);

$justice = $connexion->prepare('SELECT * FROM amende WHERE id_category = 2');
$justice->execute();
$resultatAmendeJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

$Pénal = $connexion->prepare('SELECT * FROM amende WHERE id_category = 3');
$Pénal->execute();
$resultatAmendeTravail = $Pénal->fetchAll(PDO::FETCH_ASSOC);

$Pénal = $connexion->prepare('SELECT * FROM amende WHERE id_category = 4');
$Pénal->execute();
$resultatAmendeProcedure = $Pénal->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="footer">
      <form action="index.php?id=108" method="post">
        <div class="card">
          <div class="card-footer">
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Type d'infractions</label>
                  </div>
                  <select class="custom-select" name="infraction" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                      <optgroup label="Code civil">
                        <?php foreach ($resultatAmendeCivil as $key): ?>
                            <option value="<?= $key['id_amende'] ?>"><?= $key['infraction'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                      <optgroup label="Code de justice administrative">
                          <?php foreach ($resultatAmendeJustice as $key): ?>
                          <option value="<?= $key['id_amende'] ?>"><?= $key['infraction'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                      <optgroup label="Code de protection du travailleur">
                          <?php foreach ($resultatAmendeTravail as $key): ?>
                          <option value="<?= $key['id_amende'] ?>"><?= $key['infraction'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                      <optgroup label="Code de procédure">
                          <?php foreach ($resultatAmendeProcedure as $key): ?>
                          <option value="<?= $key['id_amende'] ?>"><?= $key['infraction'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 customTAR">
                  <input type="hidden" name="id_casier" value="<?= $_GET['id_casier'] ?>">
                <button type="submit" class="btn btn-primary">Ajouter l'infraction</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
