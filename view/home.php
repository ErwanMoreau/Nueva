<?php 


$articles = home_getArticles();
// echo '<pre>';
//   var_dump($articles);  
// echo '</pre>';
?>

<?php   foreach ($articles as $v): ?>
<div class='container-fluid est-height-article'>
       <div class='container'>
         <div class='row'>
         <div class='est-article col-md-12'>
           <h2 class='est-title'><?= $v->title ?></h2>
           <p class='est-description'><?= $v->description ?></p>
           <a href="index.php?id=8&id_art=<?= $v->id ?>&id_cat=<?= $v->category_id ?>" class='btn btn-outline-primary est-btn'>En savoir +</a>
             <div class='est-likeEtcom'>
               <span class='est-like'><i class="far fa-thumbs-up"></i></i> 1250</span>
               <span class='est-com'><i class="far fa-comment-alt"></i> 250</span>
             </div>
             <div class='est-auteurDate'>
               <span class='est-auteur'> Jean-Vale-jean</span>
               <span class='est-date'> <?= $v->create_time ?></span>
             </div>
            <?php if(isset($_SESSION['acces+'])):?>
              <div class='est-admin'>
                <a class='est-edit btn btn-primary est-btn-edit' href='index.php?id=14&id_art=<?= $v->id?>'> edit</a>
                <a class='est-delete btn btn-danger est-btn-del' href='index.php?id=15&id_art=<?= $v->id?>'> delete</a>
              </div>
            <?php endif;?>
           </div>
         </div>
      </div>
    </div>

 <?php endforeach ?>   
