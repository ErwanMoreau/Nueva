<?php 
session_start();
ob_start();
     if(isset($_COOKIE['AlreadyConnect'])){
         $tab_cookies = unserialize($_COOKIE['AlreadyConnect']);
         require 'app/bdd.php';
         $sql = $connexion->prepare('SELECT * FROM user WHERE email=:email AND matricule=:matricule');
         $sql->bindvalue(':email', $tab_cookies['email'],PDO::PARAM_STR);
         $sql->bindvalue(':matricule', $tab_cookies['matricule'],PDO::PARAM_STR);
         $sql->execute();

         $user_cookie= $sql->fetch();

         if(!empty($user_cookie)){
             $_SESSION['acces'] = $array_cont = ['id_user' => $user_cookie['id_user'],'nom' => $user_cookie['nom'],'prenom' => $user_cookie['prenom']];
            
                  if($user_cookie['id_grade'] >= '5'){
                      $_SESSION['acces+'] = true;
                  }
         }
     }




    require_once 'app/includes.php';
    require_once 'view/head.php'

?>
<script type="text/javascript">
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//  new nicEditor({iconsPath : './nicEditorIcons.gif'})
</script>
        <?php 
            if(isset($_SESSION['acces'])){
        ?>

    
            <?php    
            require_once 'view/sidebar.php';  
            }
            ?>
        
<div class="container-fluid  mb-5">    
    <div class="row">
         <div class="col-md-12">
            <?php 
                require_once 'app/router.php';
            ?>
        </div>
    </div>
</div>
<?php 
    require_once 'view/footer.php';
    ob_end_flush();
?>