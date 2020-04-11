<?php 
    require './app/bdd.php';
    $sql = $connexion->prepare('SELECT dossier.id, dossier.title, dossier.date, user.nom, type.label, type.class FROM dossier, user, type WHERE dossier.id_user = user.id_user AND dossier.id_type = type.id_type ORDER BY date');
    $sql->execute();
    $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="index.php?id=19" class="btn btn-primary customPOSBtn">add dossier</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Auteur</th>
      <th scope="col">Date</th>
      <th scope="col">Voir +</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $num=0;
    foreach ($resultat as $key):?>
        <tr>
            <th scope="row"><?= $num ?></th>
            <td><button class="btn customMarginR <?=$key['class'] ?>" ><?= $key['label'] ?></button><?= $key['title']?></td>
            <td> <?= $key['nom'] ?></td>
            <td> <?= $key['date'] ?> </td>
            <td> <a class="btn btn-primary" href="index.php?id=18&id_dossier=<?= $key['id'] ?>"> Voir +</a></td>
        </tr>
    <?php $num++; endforeach ?>
  </tbody>
</table>