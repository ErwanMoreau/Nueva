<?php 
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $com = $connexion->prepare('SELECT * FROM user WHERE id_grade= 8');
    $com->execute();
    $commandant = $com->fetchAll(PDO::FETCH_ASSOC);

    $cap = $connexion->prepare('SELECT * FROM user WHERE id_grade= 7');
    $cap->execute();
    $capitaine = $cap->fetchAll(PDO::FETCH_ASSOC);

    $lieut = $connexion->prepare('SELECT * FROM user WHERE id_grade= 6');
    $lieut->execute();
    $lieutenant = $lieut->fetchAll(PDO::FETCH_ASSOC);

    $maj = $connexion->prepare('SELECT * FROM user WHERE id_grade= 5');
    $maj->execute();
    $major = $maj->fetchAll(PDO::FETCH_ASSOC);

    $insp = $connexion->prepare('SELECT * FROM user WHERE id_grade= 4');
    $insp->execute();
    $inspecteur = $insp->fetchAll(PDO::FETCH_ASSOC);

    $serg = $connexion->prepare('SELECT * FROM user WHERE id_grade= 3');
    $serg->execute();
    $sergent = $serg->fetchAll(PDO::FETCH_ASSOC);

    $ag = $connexion->prepare('SELECT * FROM user WHERE id_grade= 2');
    $ag->execute();
    $agent = $ag->fetchAll(PDO::FETCH_ASSOC);

    $sql = $connexion->prepare('SELECT * FROM user WHERE id_grade= 1');
    $sql->execute();
    $cadet = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-fluid mt-4">
 
  <div class="row"> 
      <!-- Commandant -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Commandant</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($commandant as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                  </div>
              </div>
            </div>
      </div>
      <!-- Capitaine -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Capitaine</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                <?php foreach ($capitaine as $key):?>
                    <div class="col-md-12">
                      <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                    </div>
                    <div class="col-md-12">
                        <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                    </div>
                <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Lieutenant -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Lieutenant</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($lieutenant as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Major -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Major</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($major as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Inspecteur de Police -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Inspecteur de police</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($inspecteur as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Sergent -->
      <div class="col-md-2">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Sergent</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($sergent as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Agent de police -->
      <div class="col-md-2  mt-4">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Agent de police</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($agent as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- Cadet  -->
      <div class="col-md-2 mt-4">
          <div class="card customTAC">  
              <img src="image/epaulette.gif" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Cadet</h5>
                <p class="card-text"> Administration, gestion des porblèmes et animation de la faction BLUEFOR</p>
              </div>
              <div class="card-footer">
                <div class="row customTAC">
                    <?php foreach ($cadet as $key):?>
                        <div class="col-md-12">
                        <h2 class="customTitleHieBis"> <?= $key['matricule'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h1 class="customTitleHie"> <?= $key['prenom'] ?> <?= $key['nom'] ?></h1>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
      </div>
      <!-- SAT -->
      <div class="col-md-2 mt-4">
        <div class="card">
            <div class="card-header customTAC">
                <h1 class="customTitleHie"> <strong>Section SAT </strong></h1>
            </div>
            <div class="card-body">
                <p>
                    Section D'intervention Spécial de la police
                </p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 customTAC">
                        <h2 class="customTitleHie">le Guenec</h2>
                        <h2 class="customTitleHie">Fernandez</h2>
                        <h2 class="customTitleHie">Palacio</h2>
                        <h2 class="customTitleHie">Alvarez</h2>
                        <h2 class="customTitleHie">Blasco</h2>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- DPJ -->
      <div class="col-md-2 mt-4">
        <div class="card">
            <div class="card-header customTAC">
                <h1 class="customTitleHie"> <strong>Section DPJ </strong></h1>
            </div>
            <div class="card-body">
                <p>
                    Section Chargé d'enquete sur les différent dossier ouvert.
                </p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 customTAC">
                        <h2 class="customTitleHie">Wembé</h2>
                        <h2 class="customTitleHie">Renucci</h2>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Section Com -->
      <div class="col-md-2 mt-4">
        <div class="card">
            <div class="card-header customTAC">
                <h1 class="customTitleHie"> <strong>Section Communication </strong></h1>
            </div>
            <div class="card-body">
                <p>
                    Section cargé des communication de la police avec le gouvernement ou les civil
                </p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 customTAC">
                        <h2 class="customTitleHie">Costa</h2>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Section Formation -->
      <div class="col-md-2 mt-4">
        <div class="card">
            <div class="card-header customTAC">
                <h1 class="customTitleHie"> <strong>Section Formation </strong></h1>
            </div>
            <div class="card-body">
                <p>
                    Section chargé d'assuré les differentes formation d'un policier.
                </p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 customTAC">
                        <!-- <h2 class="customTitleHie">le Guenec</h2> -->
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>