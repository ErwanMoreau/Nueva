<?php
require_once 'bdd.php';


if(isset($_POST) && !empty($_POST)){

    $options = [ 
        'cost' => 12, 
    ]; 
    $email = $_POST['email'];
    // verify if the email is not already in database
    $emailSql = $connexion->prepare('SELECT * FROM user WHERE email= :email');
    $emailSql->bindValue(':email', $email, PDO::PARAM_STR);
    $emailSql->execute();
    $resultat = $emailSql->fetchAll();

    if(empty($resultat)){

        // stock the data in variable
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options) ;
        $matricule = $_POST['matricule'];
        $grade = $_POST['id_grade'];

        // prepare the request
        $sql = $connexion->prepare('INSERT INTO user(nom, prenom, email, password, matricule,  id_grade, isDelete) VALUES(:nom, :prenom, :email, :password, :matricule,  :id_grade, 0) ');

        // insert Value into Request 
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':password', $password, PDO::PARAM_STR);
        $sql->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $sql->bindValue(':id_grade', $grade, PDO::PARAM_INT);

        // launch the request 
        $sql->execute();

        var_dump($sql);

        header('Location: index.php?id=5');
        
    } else {
        header('Location: index.php?id=5');
    }

}

?>