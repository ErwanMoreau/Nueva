<?php session_start();
require 'bdd.php';
// var_dump(filter_var($_POST['email_inscription'], FILTER_VALIDATE_EMAIL));
if(filter_var($_POST['email_inscription'], FILTER_VALIDATE_EMAIL)){
    // on verifie si l'utilisateur rentre une email qui n'existe pas deja dans 
    //la base de données si elle n'existe pas dedans on va l'ajouter dans la base de données
    $sql = $connexion->prepare('SELECT * FROM blog_user WHERE email = :email');
    $sql->bindValue(':email',$_POST['email_inscription'], PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetch();


    $mdp = password_hash($_POST['password_inscription'] , PASSWORD_BCRYPT );
    $token = md5(uniqid(rand(),true));
    if(empty($user)){
        
        // nous preparons la requete d'ajout de user et le mettons dans la base de donnéeq avec les parametres mis 
        $inscription = $connexion->prepare('INSERT INTO blog_user( pseudo, password, email, nom, prenom, birthday, token) VALUES (:pseudo, :password, :email, :nom, :prenom, :birthday,:token)' );

        $inscription->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $inscription->bindValue(':password',$mdp, PDO::PARAM_STR);
        $inscription->bindValue(':email',$_POST['email_inscription'], PDO::PARAM_STR);
        $inscription->bindValue(':nom',$_POST['lastname'], PDO::PARAM_STR);
        $inscription->bindValue(':prenom',$_POST['firstname'], PDO::PARAM_STR);
        $inscription->bindValue(':birthday',$_POST['birthday'], PDO::PARAM_STR);
        $inscription->bindValue(':token',$token, PDO::PARAM_STR);

        var_dump($inscription->execute());

        
        $_SESSION['acces'] = true;
        header('Location: index.php?id=1&error=6');
    
    }else{
        $_SESSION['errors'] =' Email déjà utilisé' ;
        header('Location: index.php?id=1&error=2');
    }
}else{
    header('Location: index.php?id=1&error=14');
}





    
   


   
