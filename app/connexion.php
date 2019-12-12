<?php 
    unset($_SESSION['success']);
    require 'bdd.php';

    $email = strtolower($_POST['email']);
    $password = $_POST['password'];

if(isset($_POST) && !empty($_POST)){

    $sql = $connexion->prepare('SELECT * FROM user WHERE email = :email');
    $sql->bindvalue(':email',$email,PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetch(PDO::FETCH_ASSOC); 
         
    if(password_verify($password, $user['password'])){
        
        if(isset($_POST['gridCheck1'])){
            
            $array_user = ['email' => $user['email'], 'token' => $user['token']];
            $tableau_serialize = serialize($array_user);
            setcookie("AlreadyConnect", $tableau_serialize, time()+3600*24*365);
    
            // $tab_cookies = unserialize($_COOKIE['AlreadyConnect'])
        }

        if(!empty($user)){
            $_SESSION['acces'] = $array_cont = ['id_user' => $user['id'], 'nom' => $user['nom'],'prenom' => $user['prenom']];
            
                if($user['id_grade'] === '1'){
                    $_SESSION['acces+'] = true;
                }
            header('Location: index.php?id=3');
        }else{
            
            header('Location: index.php?id=1');
        }
    } else {
        header('Location: index.php?id=1');
    }

}else{
  header('Location: index.php?id=1');
}


  







































































































