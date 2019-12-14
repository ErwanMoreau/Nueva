<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
require './app/bdd.php';

    $code = $connexion->prepare('SELECT * FROM amende WHERE id_category = 3');
    $code->execute();
    $resultatCode = $code->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code de la route</h1>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Infraction</th>
            <th scope="col">classification</th>
            <th scope="col">Sanction</th>
            <th scope="col">Inscrit au fichier de Police</th>
            <th scope="col">Inscrit sur le casier judiciaire</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $numb = 1;
    foreach ($resultatCode as $key):?>
        <tr>
            <th scope="row"><?=$numb?></th>
            <td><?= $key['label'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['sanction'] ?></td>
            <td><?= $key['fichierPolice'] ?></td>
            <td><?= $key['CasierJudiciaire'] ?></td>
        </tr>
    <?php $numb++; endforeach ?>

    </tbody>
</table>
<?php
    $justice = $connexion->prepare('SELECT * FROM amende WHERE id_category = 2');
    $justice->execute();
    $resultatJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code de justice administrative</h1>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Infraction</th>
        <th scope="col">classification</th>
        <th scope="col">Sanction</th>
        <th scope="col">Inscrit au fichier de Police</th>
        <th scope="col">Inscrit sur le casier judiciaire</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $numb1 = 1;
    foreach ($resultatJustice as $key):?>
        <tr>
            <th scope="row"><?=$numb1?></th>
            <td><?= $key['label'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['sanction'] ?></td>
            <td><?= $key['fichierPolice'] ?></td>
            <td><?= $key['CasierJudiciaire'] ?></td>
        </tr>
    <?php $numb1++;  endforeach ?>

    </tbody>
</table>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code pénal</h1>
    </div>
</div>
<?php
    $Pénal = $connexion->prepare('SELECT * FROM amende WHERE id_category = 1');
    $Pénal->execute();
    $resultatPénal = $Pénal->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Infraction</th>
        <th scope="col">classification</th>
        <th scope="col">Sanction</th>
        <th scope="col">Inscrit au fichier de Police</th>
        <th scope="col">Inscrit sur le casier judiciaire</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $numb2 = 1;
    foreach ($resultatPénal as $key):?>
        <tr>
            <th scope="row"><?=$numb2?></th>
            <td><?= $key['label'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['sanction'] ?></td>
            <td><?= $key['fichierPolice'] ?></td>
            <td><?= $key['CasierJudiciaire'] ?></td>
        </tr>
    <?php $numb2++; endforeach ?>

    </tbody>
</table>