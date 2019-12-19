<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $id= $_GET['id_casier'];
    $casier = $connexion->prepare('SELECT * FROM casier where id= :id');
    $casier->bindValue(':id', $id, PDO::PARAM_INT);
    $casier->execute();
    $resultatCasier = $casier->fetch(PDO::FETCH_ASSOC);


    $Code = $connexion->prepare('SELECT * FROM infraction where id_casier= :id AND id_type= :id_type');
    $Code->bindValue(':id', $id, PDO::PARAM_INT);
    $Code->bindValue(':id_type', 1, PDO::PARAM_INT);

    $penal = $connexion->prepare('SELECT infractions.total, amende.label FROM infractions, amende,casier where infractions.id_amende = amende.id AND infractions.id_casier = casier.id AND amende.id_category = 1 AND infractions.id_casier = :id');
    $penal->bindValue(':id', $id, PDO::PARAM_INT);
    $penal->execute();
    $resultatPenal = $penal->fetchAll(PDO::FETCH_ASSOC);

    $justice = $connexion->prepare('SELECT infractions.total, amende.label FROM infractions, amende,casier where infractions.id_amende = amende.id AND infractions.id_casier = casier.id AND amende.id_category = 2 AND infractions.id_casier = :id');
    $justice->bindValue(':id', $id, PDO::PARAM_INT);
    $justice->execute();
    $resultatJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

    $route = $connexion->prepare('SELECT infractions.total, amende.label FROM infractions, amende,casier where infractions.id_amende = amende.id AND infractions.id_casier = casier.id AND amende.id_category = 3 AND infractions.id_casier = :id');
    $route->bindValue(':id', $id, PDO::PARAM_INT);
    $route->execute();
    $resultatRoute = $route->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-header">
      <!-- Identity -->
      <div class="row">
        <div class="col-md-4 customTAC">
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
        <div class="col-md-4 customTAC">
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
        <div class="col-md-4 customTAC">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Numéros de Casier : </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- <h1>{{ Prenom  }}</h1> -->
              <h1 class="customTitleCardBis"> <?= $resultatCasier['numero_de_casier'] ?> </h1>
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
        <a class="customLinkBis" href="index.php?id=8&id_casier=<?= $resultatCasier['id']  ?>">Editer le casier</a>
       </div>
      </div>
    </div>
    <div class="card-body">
      <!--Crimes et delits -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Code Pénal</h1>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatPenal as $key): ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['label']?>
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
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['label']?>
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
        <div class="col-md-12">
          <h1 class="customTitleCard">Code de la Route:</h1>
        </div>
        <!-- Infraction Code de la Route -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($resultatRoute as $key): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['label']?>
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
$code = $connexion->prepare('SELECT * FROM amende WHERE id_category = 3');
$code->execute();
$resultatCode = $code->fetchAll(PDO::FETCH_ASSOC);

$justice = $connexion->prepare('SELECT * FROM amende WHERE id_category = 2');
$justice->execute();
$resultatJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

$Pénal = $connexion->prepare('SELECT * FROM amende WHERE id_category = 1');
$Pénal->execute();
$resultatPénal = $Pénal->fetchAll(PDO::FETCH_ASSOC);
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
                      <optgroup label="Code de la route ">
                        <?php foreach ($resultatCode as $key): ?>
                            <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                      <optgroup label="Code de justice administrative">
                          <?php foreach ($resultatJustice as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                          <?php endforeach ?>
                      </optgroup>
                      <optgroup label="Code Pénal">
                          <?php foreach ($resultatPénal as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
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
