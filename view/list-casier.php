<?php 
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT * FROM casier');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<a href="index.php?id=7" class="customBtn btn btn-primary">Ajouter un Casier</a>

<table class="table">
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
      <?php foreach ($resultat as $key):?>
    <tr>
        <th scope="row">1</th>
        <td><?= $key['nom'] ?></td>
        <td><?= $key['prenom'] ?></td>
        <td><?= $key['numero_de_casier'] ?></td>
        <td><a href="index.php?id=9&id_casier=<?= $key['id'] ?>" class="btn btn-primary customBtnBis"> Voir le Casier Judiciaire</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
