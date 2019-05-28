<?php 
// require 'app/bdd.php';
// if(isset($_SESSION['acces']))
// { $id = $_SESSION['acces']['id_user'];
// $sql = $connexion->prepare('SELECT * FROM blog_user WHERE id=:id');
// $sql->bindvalue(':id',$id,PDO::PARAM_INT);
// $sql->execute();
// $user= $sql->fetch();}
// var_dump($user['logo']);
// var_dump(isset($_SESSION['acces']['statut']) )
?>
  <div class='container-fluid '>
    <div class="est-bg-nav est-pos-nav">
      <?php if(isset($_SESSION['access'])):?>
        <div class="row">
          <div class="col-md-12">
            <img src="image/miniature/<?= $user['logo'];?>" alt="">
            <?= $user['pseudo']; ?>
          </div>
        </div>
      <?php endif;?>
      <div class='row est-mt'>
            <div class='col-md-12 mb-3 '>
              <div class='est-trait mb-3'></div>
              <a href='index.php?id=2'><i class="fas fa-university est-logo-nav"></i> <span class='est-text-nav'>Compte Famille</span></a>
            </div>  
      </div>
      <div class='row'>
        <div class='col-md-12 mb-3 '>
          <div class='est-trait mb-3'></div>
            <a href='index.php?id=3'><i class="fas fa-money-bill-wave-alt est-logo-nav"></i> <span class='est-text-nav'>Taxe</span></a>
        </div>  
      </div>
      <div class='row'>
        <div class='col-md-12 mb-3'>
          <div class='est-trait mb-3'></div>
            <a href='index.php?id=4'><img src='image/cia.png'class="est-cia"></i> <span class='est-text-nav'>C.I.A</span></a>
        </div>  
      </div>
      <div class='row'>
        <div class='col-md-12 mb-3 '>
          <div class='est-trait mb-3'></div>
            <a href='index.php?id=5'><img src='image/syrta.png'class="est-syrta"></i> <span class='est-text-nav'>Recensement</span></a>
        </div>  
      </div>
      <div class='row'>
        <div class='col-md-12 mb-3 '>
          <div class='est-trait mb-3'></div>
            <a href='index.php?id=6'><i class="fas fa-home est-logo-nav"></i> <span class='est-text-nav'>Stockage</span></a>
        </div>  
      </div>
      <div class='row'>
        <div class='col-md-12 mb-3 '>
          <div class='est-trait mb-3'></div>
            <a href='index.php?id=7'><i class="fas fa-info est-logo-nav est-info"></i><span class='est-text-nav'> Information</span></a>
          <div class='est-trait mt-3'></div>    
        </div>
            
      </div>
    </div>      
  </div>