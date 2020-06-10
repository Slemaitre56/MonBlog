<?php

/*
                                | -----------------------------------ROUTEUR MVC----------------------------------- | 
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



//                              |---------------------------------------- 3/ Try ------------------------------------|



// try = bloc qui contient du code pouvant générer des erreurs
    try {
        $controller = new \Projet\Controllers\Controller();
        $controllerComment = new \Projet\Controllers\CommentController();
        

// isset = diferent de nul
    if(isset($_GET["action"])){
        if($_GET["action"] == "accueil"){
            $controller->accueil();
        }elseif($_GET["action"] == "australie"){
            $controller->austra();
        }elseif($_GET["action"] == "nouvelle-zelande"){
            $controller->nZ();
        }elseif($_GET["action"] == "trucs_et_astuces"){
            $controller->trucs();
        }elseif($_GET["action"] == "contact"){
            $controller->contact();
        }elseif($_GET["action"] == "article"){
            $controller->article();
        }elseif($_GET["action"] == "form"){
            $controller->form();
        }elseif($_GET["action"] == "cgu"){
            $controller->cgu();
        }elseif($_GET["action"] == "cookie"){
            $controller->cookie();
        }elseif($_GET["action"] == "newComment"){
        $controllerComment->newComment();
        }
    }else{
        $controller->accueil();
        
    }


 
//                              |------------------------------------- 4/ Catch ---------------------------------------|    



// catch = bloc qui gére les exception quand celle-ci est levée
    } catch (Exception $e) {

        $title = "Page 404 ";
        $description = "Aucune adresse tourvée !";
        require "app/views/frontEnd/404.php";
    } 