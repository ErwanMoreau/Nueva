<?php
require 'bdd.php';

if( isset($_POST) && !empty($_POST)){

    $options = [
        'cost' => 12,
    ];

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['NewPassword'];
    $confirmPassword = $_POST['ConfirmNewpassword'];
    $id_user = $_POST['id_user'];
    $token = $_POST['token'];

    $sql = $connexion->prepare('SELECT * FROM user where id= :id');
    $sql->bindValue(':id', $id_user, PDO::PARAM_INT);
    $sql->execute();

    $resultat = $sql->fetch(PDO::FETCH_ASSOC);

    if ($token === $resultat['token'] ) {

        if ( password_verify($oldPassword, $resultat['password'])){

            if ( $newPassword === $confirmPassword){
              $finalNewPassword =  password_hash($newPassword, PASSWORD_BCRYPT, $options);

              $newSql = $connexion->prepare('UPDATE user SET password= :password where id_user= :id');
              $newSql->bindValue(':id', $id_user, PDO::PARAM_INT);
              $newSql->bindValue(':password', $finalNewPassword, PDO::PARAM_STR);
              $newSql->execute();

               header('location: index.php?id=3');
            } else {
                echo 'un des deux nouveau mot de passe est pas bon';
                // header('location: index.php?id=2');
            }
        } else {
            echo 'l\'ancien mot de passe ne correspond pas';
            // header('location: index.php?id=2');
        }
    } else {
        echo 'le token n\'est pas bon';
        // header('location: index.php?id=2');
    }
   
} else {
    echo 'aucune data';
    // header('location: index.php?id=2');
}