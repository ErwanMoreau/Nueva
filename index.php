<?php 
session_start();
ob_start();
    if(isset($_COOKIE['rememberme'])){
        $tab_cookies = unserialize($_COOKIE['rememberme']);
        require 'app/bdd.php';
        $sql = $connexion->prepare('SELECT * FROM blog_user WHERE email=:email AND token=:token');
        $sql->bindvalue(':email', $tab_cookies['email'],PDO::PARAM_STR);
        $sql->bindvalue(':token', $tab_cookies['token'],PDO::PARAM_STR);
        $sql->execute();

        $user_cookie= $sql->fetch();

        if(!empty($user_cookie)){
            $_SESSION['acces'] = $array_cont = ['pseudo' => $user_cookie['pseudo'],'id_user' => $user_cookie['id'], 'statut' => $user_cookie['statut'] ];
            
                // if($user_cookie['statut'] === '1'){
                //     $_SESSION['acces+'] = true;
                // }
        }
        // var_dump($_COOKIE);
        // var_dump($_SESSION['acces']);
    }




    require_once 'app/includes.php';
    require_once 'view/head.php'

?>

<?php 
    // if(!isset($_SESSION['acces'])){
    //     require_once 'view/connect.php';
    // }
    require_once 'view/navbar.php';
    require_once 'app/router.php';

?>

<?php 
    require_once 'view/footer.php';
    ob_end_flush();
?>