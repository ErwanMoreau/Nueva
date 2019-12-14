<?php

require 'bdd.php';

   $token = $_POST['token'];
   $id_user = $_POST['id_user'];
   $password = $_POST['NewPassword'];
   $newPassword = $_POST['ConfirmNewPassword'];

   if($password === $newPassword) {
       $sql = $connexion->prepare('SELECT * FROM user WHERE id= :id ');
       $sql->bindValue(':id', $id, PDO::PARAM_INT);
       $sql->execute();
       $resultat = $sql->fetch(PDO::FETCH_ASSOC);

//       var_dump($resultat);
       $options = [
           'cost' => 12,
       ];
        var_dump($resultat['password']);
        $hashPassword = password_hash($password,  PASSWORD_BCRYPT, $options);
        var_dump($hashPassword);
        $update = $connexion->prepare('UPDATE user SET password = :password WHERE id= :id');
        $update->bindValue(':id',$id_user,PDO::PARAM_INT);
        $update->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $update->execute();

       header('Location: index.php?id=1');

   } else {
       header('Location: index.php?id=1');
   }
