
<?php 
// Edite un film
// Ajout d'un film
// echo '<pre>';
// var_dump($_POST['id']);
// echo '<pre>';

// $_FILES contient les informations du ou des fichiers envoyées
// echo 'toto';
// var_dump($_FILES);

if (!empty($_FILES)){
 
    //  je verifie que le transfert s'est bien  
    if($_FILES['image']['error'] === 0){
    /*
        error renvoie 0  sil n'y a pas d'erreur
        1ko = 1024 octets
        1MO = 1 048 576 Octets
    */    
    // je limite la taille du fichier a 1000ko
    $maxSize = 1000 * 1024;
    if($_FILES['image']['size'] <= $maxSize){
        // la taille du fichier est inférieur ou égale 
        // je verifie l'extension du fichier et la stock
        $filesInfo = pathinfo($_FILES['image']['name']);
        //var_fump($filesInfo);
        $extension = strtolower($filesInfo['extension']);
        // je cree une variable avec les extension autorisées
        $extension_autorisees = ['jpg','jpeg','png','svg','gif'];
      
        // je verifie si l'extension est ok
        if(in_array($extension, $extension_autorisees)){
            // astuce pour créer un nom unique
            $image_name= md5(uniqid(rand(),true));
            echo $image_name;
                     /*
                        Création des miniatures 150px
                        on utilise imagecreatefrom... 
                    */
                    $config_miniature_width = 50;
                    if($extension == 'jpg' || $extension === 'jpeg'){
                        $new_image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
                    }
                    elseif($extension == 'gif' || $extension === 'jpeg'){
                        $new_image = imagecreatefromgif($_FILES['image']['tmp_name']);
                    }
                    elseif($extension == 'png' || $extension === 'jpeg'){
                        $new_image = imagecreatefrompng($_FILES['image']['tmp_name']);
                    }
                    // largeur original (en px )
                    $original_width = imagesx($new_image);
                    // hauteur originale
                    $orginal_height = imagesy($new_image);
                    //calcul de la nouvelle hauteur 
                    $miniature_height = ($orginal_height * $config_miniature_width) / $original_width;
                    // crée une nouvelle image avec le dimmensions (nouvelle largeur et hauteur)
                    $miniature = imagecreatetruecolor($config_miniature_width, $miniature_height);
                    // on remplit la miniature à partir de l'image originale
                    imagecopyresampled($miniature,
                                        $new_image,
                                        0, 0, 0, 0,
                                        $config_miniature_width,
                                        $miniature_height,
                                        $original_width,
                                        $orginal_height);

                    // chemin vers le dossier ou je stocke mes miniatures
                    $folder = 'image/miniature/';
                    // je reconstitue le lien du dossier ainsi que le lien de l'image 
                    if($extension === 'jpg' || $extension === 'jpeg')
                    {
                        imagejpeg($miniature, $folder.$image_name. '.'.$extension);
                    }
                    elseif($extension === 'png'){
                        imagepng($miniature, $folder.$image_name. '.'.$extension);
                    }
                    elseif($extension === 'gif'){
                        imagegif($miniature, $folder.$image_name. '.'.$extension);
                    }


                    // je peux transférer me fichier sur le serveur
                    move_uploaded_file($_FILES['image']['tmp_name'],'image/'.$image_name . '.'. $extension);
                    // j'ouvre une connexion et j'enregistre les infos
                    require_once 'bdd.php';
                    $id = $_GET['id_user'];
                    // preparation de la requete
                    $edit = $connexion->prepare('UPDATE blog_user SET pseudo=:pseudo ,email=:email ,nom=:nom, prenom=:prenom ,birthday=:birthday , logo=:new_image WHERE id= :id');
                   
                    // protection des données enregistrées
                    $edit->bindvalue(':id',$id,PDO::PARAM_INT);
                    $edit->bindvalue(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
                    $edit->bindvalue(':email',$_POST['email'],PDO::PARAM_STR);
                    $edit->bindvalue(':nom',$_POST['lastname'],PDO::PARAM_STR);
                    $edit->bindvalue(':prenom',$_POST['firstname'],PDO::PARAM_STR);
                    $edit->bindvalue(':birthday',$_POST['birthday'],PDO::PARAM_STR);
                    $edit->bindValue(':new_image',$image_name.'.'.$extension, PDO::PARAM_STR);

                   
                    // on exécute la requête
                    $result = $edit->execute();
                    if($result){
                        echo 'Erreur n°1';
                        header('Location: index.php?id=18&id_user='.$id.'&error=8');
                    }else{
                        echo 'Erreur n°2';
                        header('Location: index.php?id=18&id_user='.$id.'&error=10');
                    }






        }else{
            echo 'Erreur n°3';
            header('Location: index.php?id=18&id_user='.$id.'&error=11');
        }
    }else{
        echo 'Erreur n°4';
        header('Location: index.php?id=18&id_user='.$id.'&error=13');
    }

    }else{
        echo 'Erreur n°5';
        header('Location: index.php?id=18&id_user='.$id.'&error=4');
    }
    
}
elseif(empty($_FILES)){
    
    require_once 'bdd.php';
                    $id = $_GET['id_user'];
                    // preparation de la requete
                    $edit = $connexion->prepare('UPDATE blog_user SET pseudo=:pseudo ,email=:email ,nom=:nom, prenom=:prenom ,birthday=:birthday , statut=:statut WHERE id= :id');
                   
                    // protection des données enregistrées
                    $edit->bindvalue(':id',$id,PDO::PARAM_INT);
                    $edit->bindvalue(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
                    $edit->bindvalue(':email',$_POST['email'],PDO::PARAM_STR);
                    $edit->bindvalue(':nom',$_POST['lastname'],PDO::PARAM_STR);
                    $edit->bindvalue(':prenom',$_POST['firstname'],PDO::PARAM_STR);
                    $edit->bindvalue(':birthday',$_POST['birthday'],PDO::PARAM_STR);
                    $edit->bindvalue(':statut',$_POST['statut'],PDO::PARAM_INT);
                    
                    $result = $edit->execute();
                   
                    // on exécute la requête
                    
                    // var_dump($result);
                    if($result){
                        echo 'Erreur n°6';
                        header('Location: index.php?id=18&id_user='.$id.'&error=8');
                    }else{
                        echo 'Erreur n°7';
                        header('Location: index.php?id=18&id_user='.$id.'&error=10');
                    }
                
}
