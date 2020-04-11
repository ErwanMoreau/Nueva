<?php 

require './app/bdd.php';
 $id= $_SESSION['acces']['id_user'];

$sql = $connexion->prepare('SELECT * FROM user, grade Where user.id_grade= grade.id_grade AND user.id_user= :id');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

$resultat= $sql->fetch(PDO::FETCH_ASSOC);

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="index.php?id=3">
      <img class="logoAgora" src="image/agorapolis.png"   alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Casier
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?id=22">Liste de casiers</a>
                  <a class="dropdown-item" href="index.php?id=7">ajouter un casier</a>
               
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Rapport
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?id=14">Liste des rapports</a>
                  <a class="dropdown-item" href="index.php?id=12">ajouter un rapport</a>
               
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Amendes
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?id=15">Amendes</a>
                  <a class="dropdown-item" href="index.php?id=27">Calculateur</a>
               
          </li>
       
          <?php if( isset($_SESSION['acces+'])):?>
            <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                état-Major
                  </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="index.php?id=5">Liste des utilisateur</a>
                      <a class="dropdown-item" href="index.php?id=4">Ajouter un utilisateur</a>
                      <a class="dropdown-item" href="index.php?id=16">Ajouter une amende</a>
            </li>
          <?php endif?>
        </ul>
        

        <h1 class="customH1 mr-2 pt-1"><strong><?php echo $resultat['label']?></strong><span> <?php echo $resultat['nom'] ?> </span></h1>
        <a class="btn customBtnBis btn-outline-danger my-2 my-sm-0" href="index.php?id=126">Déconnexion</a>
      
    </div>
</nav>