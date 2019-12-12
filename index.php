<?php 
session_start();
ob_start();
    // if(isset($_COOKIE['rememberme'])){
    //     $tab_cookies = unserialize($_COOKIE['rememberme']);
    //     require 'app/bdd.php';
    //     $sql = $connexion->prepare('SELECT * FROM blog_user WHERE email=:email AND token=:token');
    //     $sql->bindvalue(':email', $tab_cookies['email'],PDO::PARAM_STR);
    //     $sql->bindvalue(':token', $tab_cookies['token'],PDO::PARAM_STR);
    //     $sql->execute();

    //     $user_cookie= $sql->fetch();

    //     if(!empty($user_cookie)){
    //         $_SESSION['acces'] = $array_cont = ['pseudo' => $user_cookie['pseudo'],'id_user' => $user_cookie['id'], 'statut' => $user_cookie['statut'] ];
            
    //             // if($user_cookie['statut'] === '1'){
    //             //     $_SESSION['acces+'] = true;
    //             // }
    //     }
    //     // var_dump($_COOKIE);
    //     // var_dump($_SESSION['acces']);
    // }




    require_once 'app/includes.php';
    require_once 'view/head.php'

?>
<div class="container-fluid">
    <div class="row">
        <?php 
            if(isset($_SESSION['acces'])){
        ?>

        <div class="col-md-2 customBg">
            <?php    
            require_once 'view/sidebar.php';  
            }
            ?>
        </div>

        <div class="col-md-10">
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