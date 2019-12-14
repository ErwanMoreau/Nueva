<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
require './app/bdd.php';
    $grade = $connexion->prepare('SELECT *  FROM grade');
    $grade->execute();
    $resultat = $grade->fetchAll(PDO::FETCH_ASSOC);

    $id = $_GET['id_user'];
    $user = $connexion->prepare('SELECT * FROM user WHERE id= :id ');
    $user->bindValue(':id', $id , PDO::PARAM_INT);
    $user->execute();
    $resultatUser = $user->fetch(PDO::FETCH_ASSOC);

?>
<div class="container mt-5">
    <form action="index.php?id=102" method="POST" id="addUser">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h1 class="customTitleAdd">Modifier le profile </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputSelectgrade">Grade</label>
                            </div>
                            <select class="custom-select" name="id_grade" id="id_grade" required readonly>
                                <option  selected>Choose...</option>
                                <?php
                                foreach ($resultat as $key) {
                                    ?>
                                    <option value="<?= $key['id'] ?>"<?php if($resultatUser['id_grade'] === $key['id']):?>selected<?php endif; ?> ><?= $key['label'] ?></option>

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
                            <input type="text" id="matricule" value="<?= $resultatUser['matricule'] ?>" name="matricule" class="form-control" aria-label="inputMatricule" aria-describedby="inputMatricule" required>
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
                            <input type="text" id="nom" name="nom" value="<?= $resultatUser['nom'] ?>" class="form-control" aria-label="inputFirstName" aria-describedby="inputFirstName" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputLastName">Prénom</span>
                            </div>
                            <input type="text" id="prenom" value="<?= $resultatUser['prenom'] ?>" name="prenom" class="form-control" aria-label="inputLastName" aria-describedby="inputLastName" required>
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
                            <input type="email" id="email" value="<?= $resultatUser['email'] ?>" name="email" class="form-control" aria-label="inputEmail" aria-describedby="inputEmail" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary"  type="button" id="inputPassword">Mot de passe </button>
                            </div>
                            <input type="text"  value="**********" name="password"  class="form-control" aria-label="inputPassword" aria-describedby="inputPassword" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 customTAR">
                        <a href="index.php?id=125&id_user=<?= $resultatUser['id'] ?>" class="customReset">new password</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 customTAR">
                        <button class="btn btn-primary">modifier l'utilisateur</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

