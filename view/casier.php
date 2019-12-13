<?php
    require './app/bdd.php';

    $id= $_GET['id_casier'];
    $casier = $connexion->prepare('SELECT * FROM casier where id= :id');
    $casier->bindValue(':id', $id, PDO::PARAM_INT);
    $casier->execute();
    $resultatCasier = $casier->fetch(PDO::FETCH_ASSOC);


    $Code = $connexion->prepare('SELECT * FROM infraction where id_casier= :id AND id_type= :id_type');
    $Code->bindValue(':id', $id, PDO::PARAM_INT);
    $Code->bindValue(':id_type', 1, PDO::PARAM_INT);

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
            <?= $resultatCasier['information'] ?>
       </div>
      </div>
    </div>
    <div class="card-body">
      <!--Crimes et delits -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Délits</h1>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">4</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">2</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-4">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Crimes</h1>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">4</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">2</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Lorem, ipsum dolor  consectetur adipisicing elit.
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <h1 class="customTitleCard"> Infractions au code de la Route:</h1>
        </div>
        <!-- Infraction Code de la Route -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">Exces de Vitesse +40km/h
                    <span class="badge badge-primary badge-pill">4</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">desctuction de bien publique
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Exces de Vitesse +40km/h
                    <span class="badge badge-primary badge-pill">2</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Exces de Vitesse +80km/h
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <form action="">
        <div class="card">
          <div class="card-footer">
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Type d'infractions</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Infractions Code de la route</option>
                    <option value="2">Délits</option>
                    <option value="3">Crimes</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Infractions</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Exces de Vitesse +40km/h</option>
                    <option value="2">Exces de Vitesse +60km/h</option>
                    <option value="3">Exces de Vitesse +80km/h</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 customTAR">
                <button type="submit" class="btn btn-primary">Ajouter l'infraction</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
