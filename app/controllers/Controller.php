<?php
namespace Projet\Controllers;
/*
                                | ------------------------------------CONTROLLER----------------------------------- | 
                                |                                                                                   |
                                |                             1/ Fonction accueil                                   |
                                |                             2/ Fonction austra                                    |
                                |                             3/ Fonction nZ                                        |   
                                |                             4/ Fonction trucs                                     | 
                                |                             5/ Fonction contact                                   | 
                                |                             6/ Fonction article                                   |
                                |                             7/ Fonction Form                                      |
                                |                             8/ Fonction CGU                                       |
                                |                             8/ Fonction Site Map                                  |
                                |                                                                                   |                                                              
                                |-----------------------------------------------------------------------------------|
*/


class Controller{



//                              |------------------------------- 1/ Fonction accueil -------------------------------|



    function accueil() { 
        $title = "Mon blog Austra-Zelandia ";
        $description = "Bienvenue sur le blog sur mon voyage en Australie et en Nouvelle-Zelande !";   
        require "./app/views/frontEnd/pages/accueil.php";
    }



//                              |-------------------------------- 2/ Fonction austra --------------------------------|



    function austra() {
        $title = "Mon blog Austra-Zelandia - Australie ";
        $description = "Vous trouverez ici tous mes articles sur l'Australie ! De notre arrivée, à la découverte des kangouroux sauvages !"; 
        
        $articleManager = new \Projet\Models\ArticleManager();
        $articlesList = $articleManager->readArticles($_REQUEST['action']);
        // $commentManager = new \Projet\Models\CommentManager();
        // $commentsList = $commentManager->readComments($_REQUEST['action']);
        
        require "./app/views/frontEnd/pages/australie.php";
        
    }



//                              |--------------------------------- 3/ Fonction nZ -----------------------------------|



    function nZ() {
        $title = "Mon blog Austra-Zelandia - Nouvette-Zelande ";
        $description = "Vous trouverez ici tous mes articles sur la Nouvelle-Zélande ! Des montagnes des seigneurs des anneaux aux champs remplit de moutons !";
        
        $articleManager = new \Projet\Models\ArticleManager();
        $articlesList = $articleManager->readArticles($_REQUEST['action']);

        // $commentManager = new \Projet\Models\CommentManager();
        // $commentsList = $commentManager->readComments($_REQUEST['action']);

        require "./app/views/frontEnd/pages/n-Zelande.php";
        
    }



//                              |--------------------------------- 4/ Fonction trucs --------------------------------|



    function trucs() {
        $title = "Mon blog Austra-Zelandia - Trucs et astuces ";
        $description = "Vous trouverez ici tous mes articles sur les trucs et astuces pour ce voyages ! Le permis ? Les valises ? La trousse de pharmacie ?";
        
        $articleManager = new \Projet\Models\ArticleManager();
        $articlesList = $articleManager->readArticles($_REQUEST['action']);

        // $commentManager = new \Projet\Models\CommentManager();
        // $commentsList = $commentManager->readComments($_REQUEST['action']);

        require "./app/views/frontEnd/pages/trucs.php";
        
    }
    
    

//                              |-------------------------------- 5/ Fonction contact --------------------------------|



    function contact() {
        $title = "Mon blog Austra-Zelandia - Contact ";
        $description = "Vous trouverez ici tous mes articles sur l'Australie !";
        require "./app/views/frontEnd/pages/contact.php";
    
    }



//                              |--------------------------------- 6/ Fonction Article -------------------------------|



    function article() {
        $title = "Mon blog Austra-Zelandia - Article ";
        $description = "Vous trouverez ici tous mes articles !";

        $articleManager = new \Projet\Models\ArticleManager();
        $article = $articleManager->readOneArticle();
        

        require "./app/views/frontEnd/pages/article.php";
        
    }


//                              |-------------------------------- 7/ Fonction Formulaire -----------------------------|    



    function form(){
        $formManager = new \Projet\Models\FormManager();
        $contact = $formManager->contact();
        
    }

    

//                              |----------------------------------- 8/ Fonction CGU ---------------------------------|



    function cgu(){
        require "./app/views/frontEnd/pages/cgu.php"; 
    }



//                              |----------------------------------- 9/ Fonction cookie ---------------------------------|


    function cookie(){
        require "./app/views/frontEnd/cookie/cookie.php"; 
    }


//                              |---------------------------------- 9/ Fonction site Map --------------------------------|


    function siteMap(){
        require "./app/views/frontEnd/siteMap.php"; 
    }


}



