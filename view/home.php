<?php
if( !isset($_SESSION['acces'])){
  header('Location: index.php?id=1');
}


  require './app/bdd.php';
 ?>
<div class="container-fluid mt-5">
  <div class="row">

    <?php
      $rapport = $connexion->prepare('SELECT * FROM rapport WHERE isDelete= 0 LIMIT 5');
      $rapport->execute();
      $resusltatRapport = $rapport->fetchAll(PDO::FETCH_ASSOC);
    ?>

  <?php
    $rapport = $connexion->prepare('SELECT * FROM rapport WHERE isDelete= 0 LIMIT 5');
    $rapport->execute();
    $resusltatRapport = $rapport->fetchAll(PDO::FETCH_ASSOC);

  ?>

  <!-- Last Rapport -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12 customTAC">
          
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-12 mt-3 mb-2 customTAC ">
                  <h1 class="customTitle">Derniers Rapport de Mission</h1>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Rapports</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($resusltatRapport as $key):?>
                  <tr>
                    <td scope="row"><?= $key['title'] ?></td>
                    <td>
                      <a href="index.php?id=11&id_rapport=<?= $key['id'] ?>" class="btn btn-primary customBtnDash">Voir +</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  General Informations -->
    <?php 
      $info = $connexion->prepare('SELECT * FROM information WHERE isDelete = 0 LIMIT 5');
      $info->execute();
      $resultatInfo = $info->fetchAll(PDO::FETCH_ASSOC);
//      var_dump($resultatInfo);
    ?>
    <!--  -->
    <div class="col-md-6">
      <div class="row">
        
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-12 customTAC">
                  <h1 class="customTitle">Informations Générales</h1>
                </div>
                <div class="col-md-12">
                  <form action="index.php?id=117" method="POST">
                    <div class="col-md-12">
                      <p >Ajouter une information (lieux illégaux, etc..)</p>
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" name="information" class="form-control" placeholder="point suspect" >
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" >Ajouter</button>
                      </div>
                    </div>
                  </form>
                </div>
             
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Informations générales</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    foreach($resultatInfo as $key ):
                  ?>
                  <tr>
                    <td scope="row"><?= $key['description'] ?></td>
                    <td>
                      <a href="index.php?id=118&id_info=<?=$key['id'] ?>" >
                        <svg class="customSvg" width="25px" height="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                          viewBox="0 0 475.2 475.2" style="enable-background:new 0 0 475.2 475.2;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M405.6,69.6C360.7,24.7,301.1,0,237.6,0s-123.1,24.7-168,69.6S0,174.1,0,237.6s24.7,123.1,69.6,168s104.5,69.6,168,69.6
                                  s123.1-24.7,168-69.6s69.6-104.5,69.6-168S450.5,114.5,405.6,69.6z M386.5,386.5c-39.8,39.8-92.7,61.7-148.9,61.7
                                  s-109.1-21.9-148.9-61.7c-82.1-82.1-82.1-215.7,0-297.8C128.5,48.9,181.4,27,237.6,27s109.1,21.9,148.9,61.7
                                  C468.6,170.8,468.6,304.4,386.5,386.5z"/>
                                <path d="M342.3,132.9c-5.3-5.3-13.8-5.3-19.1,0l-85.6,85.6L152,132.9c-5.3-5.3-13.8-5.3-19.1,0c-5.3,5.3-5.3,13.8,0,19.1
                                  l85.6,85.6l-85.6,85.6c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4l85.6-85.6l85.6,85.6c2.6,2.6,6.1,4,9.5,4
                                  c3.5,0,6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1l-85.4-85.6l85.6-85.6C347.6,146.7,347.6,138.2,342.3,132.9z"/>
                              </g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                                            <g>
                            </g>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
    $freq = $connexion->prepare('SELECT * FROM frequence');
    $freq->execute();
    $resultatFreq = $freq->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- Generate Frequencie -->
  <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
      <div class="row">
        
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-12 customTAC">
                <h1 class="customTitle">Générateur de Fréquences</h1>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row mt-5 mb-4">
                  <div class="col-md-6 customTAC">
                    <form action="index.php?id=122" method="POST"> 
                        <div class="row">
                          <div class="col-md-12">
                            <h1 class="customTitleBis">fréquence Courte</h1>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p class="customCount"><?= $resultatFreq['freqCourte'] ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <button name="freqC" type="submit" id="frequenceC" class="btn btn-primary">Nouvelle Fréquence</button>
                          </div>
                        </div>
                    </form>
                  </div>
                <div class="col-md-6 customTAC">
                  <form action="index.php?id=123" method="POST">  
                    <div class="row">
                      <div class="col-md-12">
                        <h1 class="customTitleBis">fréquence longue</h1>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p class="customCount"><?= $resultatFreq['freqLongue'] ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-primary" (click)="RadioLongue()">Nouvelle Fréquence</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>