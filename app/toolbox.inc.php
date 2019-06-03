<?php
/**
 * 
 * 
 * 
 * 
 */

define('MAXARTBYPAGE',10);

function home_getArticles(){ // limite de 3 articles
    return getArticles(null,0,3);
}

function cat_getArticles($category_id, $num_page){ //choix catégorie 
    return getArticles($category_id, ($num_page - 1) * MAXARTBYPAGE); 

}

function getArticles($category_id = null, $offset = 0, $limit = MAXARTBYPAGE){
    require 'bdd.php';
    if( !is_null($category_id)){

        $getArticles = $connexion->prepare('SELECT * FROM blog_article WHERE category_id = :id_category');
        $getArticles->bindValue(':id_category',$category_id, PDO::PARAM_STR);
        $getArticles->execute();
        $getArticlesResult=  $getArticles->fetchAll(PDO::FETCH_OBJ);
        return $getArticlesResult;
        echo 'coucou';
    }elseif(is_null($category_id)){

        $getArticles = $connexion->prepare('SELECT * FROM blog_article LIMIT :offset, :limite');

        $getArticles->bindValue(':offset',$offset, PDO::PARAM_INT);
        $getArticles->bindValue(':limite',$limit, PDO::PARAM_INT);

        $getArticles->execute();
        $getArticlesResult=  $getArticles->fetchall(PDO::FETCH_OBJ);
        return $getArticlesResult;
    }else{
        echo 'error';
    }
    
}

// Fonction pour la partie back office pour recuper les user 
function getUser_back($num_page){ //choix catégorie 
    return getuser(($num_page - 1) * MAXARTBYPAGE); 

}

function getuser($offset = 0, $limit = MAXARTBYPAGE){
    require 'bdd.php';
    
        $getuser = $connexion->prepare('SELECT * FROM blog_user ORDER BY create_time DESC LIMIT :offset, :limite');

        $getuser->bindValue(':offset',$offset, PDO::PARAM_INT);
        $getuser->bindValue(':limite',$limit, PDO::PARAM_INT);

        $getuser->execute();
        $getuserResult=  $getuser->fetchall(PDO::FETCH_OBJ);
        return $getuserResult;
   
}

// Fonction pour la partie back office pour recuper les commentaires 
function getcom_back($num_page){ //choix catégorie 
    return getcomment(($num_page - 1) * MAXARTBYPAGE); 

}

function getcomment($offset = 0, $limit = MAXARTBYPAGE){
    require 'bdd.php';
    

        $getcomment = $connexion->prepare('SELECT * FROM blog_comment ORDER BY create_time DESC LIMIT :offset, :limite');

        $getcomment->bindValue(':offset',$offset, PDO::PARAM_INT);
        $getcomment->bindValue(':limite',$limit, PDO::PARAM_INT);

        $getcomment->execute();
        $getcommentResult=  $getcomment->fetchall(PDO::FETCH_OBJ);
        return $getcommentResult;
   
    
}


// Fonction pour la partie back office pour recuper les articles 
function getarticle_back($num_page){ //choix catégorie 
    return getart_back(($num_page - 1) * MAXARTBYPAGE); 

}

function getart_back($offset = 0, $limit = MAXARTBYPAGE){
    require 'bdd.php';
    
        $getart_back = $connexion->prepare('SELECT * FROM blog_article  ORDER BY create_time DESC LIMIT :offset, :limite');

        $getart_back->bindValue(':offset',$offset, PDO::PARAM_INT);
        $getart_back->bindValue(':limite',$limit, PDO::PARAM_INT);

        $getart_back->execute();
        $getart_backResult=  $getart_back->fetchall(PDO::FETCH_OBJ);
        return $getart_backResult;
   
}






























































































