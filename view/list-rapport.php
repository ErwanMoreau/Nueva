<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
    require './app/bdd.php';

    $sql = $connexion->prepare('SELECT rapport.id, rapport.title, user.nom, type.label, type.class FROM rapport, user, type WHERE rapport.id_user = user.id AND rapport.id_type = type.id AND rapport.isDelete = 0');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<a href="index.php?id=12" class="btn btn-primary customBtnBisPos"> ajouter rapport</a>
<table class="table mt-4">
  <thead class="thead">
  <tr>
    <th scope="col">#</th>
    <th scope="col">Titre du rapport</th>
    <th scope="col">Auteur du rapport</th>
    <th scope="col">Voir le rapport</th>

  </tr>
  </thead>
  <tbody>
  <?php foreach ($resultat as $key):?>
  <tr>
    <th scope="row">1</th>
    <td><button class="btn <?= $key['class'] ?>"><?= $key['label'] ?></button><?= $key['title'] ?></td>
    <td><?= $key['nom'] ?></td>
    <td><a href="index.php?id=11&id_rapport=<?= $key['id'] ?>" class="btn btn-primary customBtnBis"> Voir +</a> </td>
  </tr>

  <?php endforeach ?>
  
  </tbody>
</table>
