<?php  if( !isset($_SESSION['acces'])){
    // header('Location: index.php?id=1&error=3');
}
    require './app/bdd.php';
    $grade = $connexion->prepare('SELECT *  FROM grade');
    $grade->execute();
    $resultat = $grade->fetchAll(PDO::FETCH_ASSOC);

 ?>

<div class="container mt-5">
  <form action="index.php?id=102" method="POST" id="addUser">
      <div class="card">
        <div class="card-header">
          <div class="row mb-2">
            <div class="col-md-12">
              <h1 class="customTitleAdd">Ajouter un policier</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputSelectgrade">Grade</label>
                </div>
                <select class="custom-select" name="id_grade" id="id_grade" required>
                    <option  selected>Choose...</option>
                    <?php 
                      foreach ($resultat as $key) {
                        ?>
                        <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>

                        <?php
                      }
                    ?>
                  
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputMatricule">Matricule</span>
                </div>
                <input type="text" id="matricule" name="matricule" class="form-control" aria-label="inputMatricule" aria-describedby="inputMatricule" required>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Firstname Lastname -->
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputFirstName">Nom</span>
                </div>
                <input type="text" id="nom" name="nom" class="form-control" aria-label="inputFirstName" aria-describedby="inputFirstName" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputLastName">Prénom</span>
                </div>
                <input type="text" id="prenom" name="prenom" class="form-control" aria-label="inputLastName" aria-describedby="inputLastName" required>
              </div>
            </div>
          </div>
          <!-- Email And Generate Password -->
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputEmail">email @</span>
                </div>
                <input type="email" id="email" name="email" class="form-control" aria-label="inputEmail" aria-describedby="inputEmail" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary"  type="button" id="inputPassword">Générer mdp </button>
                </div>
                <input type="text" id="password" name="password"  class="form-control" aria-label="inputPassword" aria-describedby="inputPassword" required readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12 customTAR">
              <button class="btn btn-primary">Ajouter un utilisateur</button>
            </div>
          </div>
        </div>
      </div>
  </form>
</div>

