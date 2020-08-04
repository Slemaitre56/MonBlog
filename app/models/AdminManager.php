<?php
namespace Projet\Models;
/*
                                | ------------------------------------ADMINMANAGER--------------------------------- | 
                                |                                                                                   |
                                |                             1/ Fonction createCompte                              |
                                |                             2/ Fonction login                                     |
                                |                             3/ Fonction logout                                    |                               
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
*/


class AdminManager extends DbConnexion
{

    

//                              |--------------------------- 1/ Fonction createCompte -----------------------------|



// Fonction créer un article via la class Article
    static function createCompte(Connexion $connexion): void
    {
        // Pour créer un article
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();
        // On insére dans la table 'article' le titre, l'image, la date de création, la date de mise à jour, le contenu, la ref-page 
        $request = "INSERT INTO admin (pseudo, email, password) VALUES(:pseudo, :email, :password) ";
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute(
            [
            'pseudo'=>htmlentities($connexion->getPseudo()),
            'email'=>htmlentities($connexion->getEmail()),
            'password'=>password_hash($connexion->getPassword(), PASSWORD_DEFAULT)
            ]
        );
          
        $db = DbConnexion::closeConnexion();
        
    
        
    }


 
//                              |------------------------------- 2/ Fonction login --------------------------------|




    static function login($pseudo, $passwd)
    {
        $db = DbConnexion::openConnexion();
        if(isset($pseudo) && isset($passwd)){
            $login = $db->prepare('SELECT id, pseudo, password FROM admin WHERE pseudo =?');
            $login->execute([$pseudo]);
            $login = $login->fetch();
              if(password_verify($passwd, $login['password'])){
                $_SESSION['pseudo'] = $login['id'];  
                header("location: admin.php?action=editer");
              }else{
                return " Le pseudo et le mot de passe sont erronés";                           
              }
        }
        
    }
    



//                              |------------------------------ 3/ Fonction logout ---------------------------------|



    static function logout(){
        unset($_SESSION['pseudo']);
        session_destroy();
        
    }

   
     
}

