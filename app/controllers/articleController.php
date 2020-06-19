<?php
namespace Projet\Controllers;

/*
                                | -------------------------------ARTICLECONTROLLER--------------------------------- | 
                                |                                                                                   |
                                |                             1/ Fonction createArticle                             |
                                |                             2/ Fonction updateArticle                             |   
                                |                             3/ Fonction deleteArticle                             | 
                                |                                                                                   |                                                             
                                |-----------------------------------------------------------------------------------|
*/

class ArticleController{



//                              |---------------------------- 1/ Fonction createArticle -----------------------------|



function createArticle(){
    
    $article = new \Projet\Models\Article($_REQUEST['title'],$_REQUEST['content'],$_FILES['image'],$_REQUEST['ref_page']);
    $objet = new \Projet\Models\ArticleManager();
    $errors = $objet->createArticle($article);
    if(empty($errors)){       
        header('Location: /admin.php?action=ancien');
    }else{
        $title = "Administration - Créer un article ";
        $description = "Sur cette page vous pouvez créer un article !";
        require "./app/views/backOffice/edit.php";
    }
    
}



//                              |---------------------------- 2/ Fonction updateArticle -----------------------------|



function updateArticle(){
    $article = new \Projet\Models\Article($_REQUEST['title'],$_REQUEST['content'],$_FILES['image'],$_REQUEST['ref_page']);
    
    $objet = new \Projet\Models\ArticleManager();
    $errors = $objet->updateArticle($article);
    if(empty($errors)){       
        header('Location: /admin.php?action=ancien');
    }else{
        $title = "Administration - Créer un article ";
        $description = "Sur cette page vous pouvez créer un article !";
        require "./app/views/backOffice/update.php";
    }
}



//                              |----------------------------- 3/ Fonction deleteArticle ----------------------------|



function deleteArticle(){
    
    \Projet\Models\ArticleManager::deleteArticle($_GET["id"]);
    header('Location: /admin.php?action=ancien');
    
}

}