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
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    if(empty($resultat)){
        echo 'test';
        // generate unique Token for security control
        function token($length = 60){
            $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                      '0123456789';
          
            $str = '';
            $max = strlen($chars) - 1;
          
            for ($i=0; $i < $length; $i++)
              $str .= $chars[mt_rand(0, $max)];
          
            return $str;
          }

        // stock the data in variable
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options) ;
        $matricule = $_POST['matricule'];
        $grade = intval($_POST['id_grade']);
        $token = token();
        echo '<pre>';
        var_dump($nom, $prenom, $password, $matricule, $grade,$token, $email);
        echo '</pre>';

          $requete = $connexion->prepare('INSERT INTO user (nom, prenom, email, password, matricule, id_grade) VALUES (:nom, :prenom, :email, :password, :matricule, :id_grade)');
          $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
          $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
          $requete->bindValue(':email', $email, PDO::PARAM_STR);
          $requete->bindValue(':password', $password, PDO::PARAM_STR);
          $requete->bindValue(':matricule', $matricule, PDO::PARAM_STR);
          $requete->bindValue(':id_grade', $grade, PDO::PARAM_INT);

          $requete->execute();
         header('Location: index.php?id=5');


    }
}
