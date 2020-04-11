<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM casier');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- <a href="index.php?id=7" class="customBtn btn btn-primary">Ajouter un Casier</a> -->

<table class="table mt-4">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Numéros de Casier</th>
        <th scope="col">Plus d'informations</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $numb = 1;
      foreach ($resultat as $key):?>
    <tr>
        <th scope="row"><?=$numb;?></th>
        <td><?= $key['nom'] ?></td>
        <td><?= $key['prenom'] ?></td>
        <td><?= $key['numeroCasier'] ?></td>
        <td><a href="index.php?id=9&id_casier=<?= $key['id_casier'] ?>" class="btn btn-sm btn-primary customBtnBis"> Voir le Casier Judiciaire</a></td>
    </tr>
    <?php
        $numb++;
      endforeach ?>
  </tbody>
</table>
