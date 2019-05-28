<?php 

unset($_SESSION['success']);
require 'bdd.php';
var_dump(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL));
if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    $sql = $connexion->prepare('SELECT * FROM blog_user WHERE email = :mail');


        $sql->execute(
            [
                'mail'    => $_POST['mail'],
            ]
            );

        

            $user = $sql->fetch(); 
            echo'<pre>'; 
           var_dump($user);
           echo'</pre>';
        var_dump(password_verify ($_POST['password'],$user['password']));

      
        
        

        if(isset($_POST['gridCheck1'])){
            echo 'coucou' ;
            $array_user = ['email' =>$user['email'], 'token' => $user['token']];
            $tableau_serialize = serialize($array_user);
            // echo '<pre>';  print_r($array_user); echo '</pre>';
                setcookie("rememberme", $tableau_serialize, time()+3600*24*365);
            $tab_cookies = unserialize($_COOKIE['rememberme']);
            echo '<hr/><pre>'; print_r($tab_cookies); echo '</pre>';
        }
        if(!empty($user)){
            $_SESSION['acces'] = $array_cont = ['pseudo' => $user['pseudo'],'id_user' => $user['id'], 'statut' => $user['statut'] ];
            
                if($user['statut'] === '1'){
                    $_SESSION['acces+'] = true;
                }
                // var_dump($_SESSION['acces']);
        header('Location: index.php?id=1&error=7');
        }else{
            
            header('Location: index.php?id=1&error=1');
            
            
        }

    
}else{
    header('Location: index.php?id=1&error=14');
}


  







































































































