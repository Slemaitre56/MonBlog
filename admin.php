<?php

/*
                                | --------------------------------ROUTEUR ADMIN MVC-------------------------------- | 
                                |                                                                                   |                                                                                                                                       
                                |                              1/ Session_start                                     |
                                |                              2/ Composer Autoload                                 |
                                |                              3/ Try                                               |
                                |                              4/ Catch                                             |
                                |                                                                                   | 
                                |-----------------------------------------------------------------------------------|
*/



//                              |--------------------------------- 1/ Session_start --------------------------------|



// Important pour la sécurité de vos fichiers : les sessions
// Démarre une session
session_start();



//                              |--------------------------------- 2/ Composer Autoload -----------------------------|



// autoloard.php généré avec Composer
require_once __DIR__. "/vendor/autoload.php";
if (file_exists(__DIR__ . "/.env")) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}


//                              |---------------------------------------- 3/ Try ------------------------------------|



// try = bloc qui contient du code pouvant générer des erreurs
    try {
        
        $controllerAdmin = new \Projet\Controllers\AdminController();
        $controllerArticle = new \Projet\Controllers\ArticleController();
       
// isset = différent de nul
    if(isset($_GET["action"])){
        if($_GET["action"] == "connexion"){
            $controllerAdmin->loginAdmin();
        }elseif($_GET["action"] == "editer"){
            $controllerAdmin->edit();
        }elseif($_GET["action"] == "ancien"){
            $controllerAdmin->listArticles();
        }elseif($_GET["action"] == "modifier"){
            $controllerAdmin->update();
        }elseif($_GET["action"] == "supprimer"){
            $controllerAdmin->delete();
        }elseif($_GET["action"] == "inscription"){
            $controllerAdmin->register();
        }elseif($_GET["action"] == "create"){
            $controllerArticle->createArticle();
        }elseif($_GET["action"] == "update"){
            $controllerArticle->updateArticle();
        }elseif($_GET["action"] == "delete"){
            $controllerArticle->deleteArticle();
        }elseif($_GET["action"] == "logout"){
            $controllerAdmin->logoutAdmin();
        }
    }else{
        $controllerAdmin->loginAdmin();        
    }


 
//                              |------------------------------------- 4/ Catch ---------------------------------------|    



// catch = bloc qui gére les exception quand celle-ci est levée
    } catch (Exception $e) {
        require "app/views/frontEnd/404.php";
    } 