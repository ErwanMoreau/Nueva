<?php session_start();
require 'bdd.php';
// var_dump(filter_var($_POST['email_inscription'], FILTER_VALIDATE_EMAIL));
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    // on verifie si l'utilisateur rentre une email qui n'existe pas deja dans 
    //la base de données si elle n'existe pas dedans on va l'ajouter dans la base de données
    $sql = $connexion->prepare('SELECT * FROM user WHERE email = :email OR pseudo = :email');
    $sql->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetch();


    $mdp = password_hash($_POST['password'] , PASSWORD_BCRYPT );
    $token = md5(uniqid(rand(),true));
    
    if(empty($user)){
        
        // nous preparons la requete d'ajout de user et le mettons dans la base de donnéeq avec les parametres mis 
        $inscription = $connexion->prepare('INSERT INTO user( email, password, pseudo,  token) VALUES (:email, :password, :pseudo, :token)' );

        $inscription->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $inscription->bindValue(':password',$mdp, PDO::PARAM_STR);
        $inscription->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
        $inscription->bindValue(':token',$token, PDO::PARAM_STR);

        var_dump($inscription->execute());


        
        $_SESSION['acces'] = true;
        header('Location: index.php?id=2&error=5');
    
    }else{
        $_SESSION['errors'] =' Email déjà utilisé' ;
        header('Location: index.php?id=22&error=3');
    }
}else{
    header('Location: index.php?id=22&error=4');
}





    
   


   
