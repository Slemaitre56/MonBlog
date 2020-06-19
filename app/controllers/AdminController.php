<?php
namespace Projet\Controllers;

/*
                                | --------------------------------ADMINCONTROLLER---------------------------------- | 
                                |                                                                                   |
                                |                             1/ Fonction editer                                    |
                                |                             2/ Fonction modifier                                  |
                                |                             3/ Fonction ancien                                    |   
                                |                             4/ Fonction supprimer                                 | 
                                |                             5/ Fonction login                                     |
                                |                             6/ Fonction inscription                               |                                
                                |                             7/ Fonction compteAdmin                               |     
                                |                             8/ Fonction listMails                                 |                                                          
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
*/



class AdminController
{



//                              |-------------------------------- 1/ Fonction editer -------------------------------|



    public function edit()
    {
        if (!empty($_SESSION['pseudo'])) {
            $title = "Administration - Editer un article ";
            $description = "Sur cette page vous pouvez créer un nouvelle article !";
            require "app/views/backOffice/edit.php";
        } else {
            header("location: admin.php?action=connexion");
        }
    }



//                              |-------------------------------- 2/ Fonction modifier -----------------------------|



    public function update()
    {
        $title = "Administration - Modifier un article ";
        $description = "Sur cette page vous pouvez modifier un article !";

        $articleManager = new \Projet\Models\ArticleManager();
        $article = $articleManager->readOneArticle();

        require "app/views/backOffice/update.php";
    }



//                              |------------------------------- 3/ Fonction ancien --------------------------------|



    public function listArticles()
    {
        $title = "Administration - Trouver un article ";
        $description = "Sur cette page vous trouverez la liste de tous les articles publiés !";

        $articleManager = new \Projet\Models\ArticleManager();
        $articlesAllList = $articleManager->readAllArticles();

        require "./app/views/backOffice/listArticles.php";
    }



//                              |------------------------------ 4/ Fonction supprimer ------------------------------|




    public function delete()
    {
        $title = "Administration - Supprimer un article ";
        $description = "Sur cette page vous pouvez supprimer un article !";

        require "./app/views/backOffice/delete.php";
    }



//                              |--------------------------------- 5/ Fonction login -------------------------------|



    public function loginAdmin()
    {
        $title = "Administration - Se connecter ";
        $description = "Sur cette page vous pouvez vous connecter en tant qu'administrateur";
        if(!empty($_POST)){
        $pseudo = $_POST["pseudo"];
        $passwd = $_POST["password"];
            
        $objet = new \Projet\Models\AdminManager();      
        $error = $objet->login($pseudo, $passwd);
        }        
            
        require "./app/views/backOffice/login.php";
    }



//                              |----------------------------- 6/ Fonction inscription -----------------------------|



    public function register()
    {
        $title = "Administration - S'inscrire ";
        $description = "Sur cette page vous pourvez vous inscrire pour devenir administrateur !";
        if(!empty($_POST)){
            $connexion = new \Projet\Models\Connexion($_REQUEST['pseudo'], $_REQUEST['email'], $_REQUEST['password']);
            \Projet\Models\AdminManager::createCompte($connexion);
            header("location: admin.php?action=connexion");      
            } 
        
        
        require "./app/views/backOffice/register.php";
    }



//                              |----------------------------- 7/ Fonction compteAdmin -----------------------------|


    public function logoutAdmin()
    {
        \Projet\Models\AdminManager::logout();
        header("Location: index.php?action=accueil");
    
    }

//                              |----------------------------- 8/ Fonction listMails -----------------------------|


    public function listMails()
    {
        $title = "Administration - Trouver vos mails ";
        $description = "Sur cette page vous trouverez la liste de tous les mails reçus !";

        $formManager = new \Projet\Models\FormManager();
        $mailsAllList = $formManager->readAllContact();

        require "./app/views/backOffice/listMails.php";

    }
      
    
    
}
