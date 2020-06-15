<?php
namespace Projet\Models;

/*
                                | ---------------------------------BASE DE DONNEE---------------------------------- | 
                                |                                                                                   |                                                                                                                                       
                                |                   1/ Fonction openConnexion                                       |
                                |                   2/ Try                                                          |
                                |                   3/ Catch                                                        |
                                |                   4/ fonction closeConnexion                                      | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
*/

class DbConnexion
{
//                              |----------------------------- 1/ Fonction openConnexion ---------------------------|
//                                                      ---- Connexion à la base de donnée ----



    static function openConnexion()
    {



//                              |--------------------------------------- 2/ Try -------------------------------------|
    


        // try = bloc qui contient du code pouvant générer des erreurs
        try {

        // Voir .env (récupére information dans heroku)
        if (getenv('DB_HOST')) {
            $host = getenv('DB_HOST');
            $dbname =  getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pwd = getenv('DB_PASSWORD');
        }else{
            $host = $_ENV['DB_HOST'];
            $dbname =  $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pwd = $_ENV['DB_PASSWORD'];
        }
    
            // pdo = php data objet
            $pdo = new \PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user,$pwd);
        
            // constantes pour gérer les erreurs
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }



//                              |------------------------------------- 3/ Catch -------------------------------------|



        // catch = bloc qui gére les exception quand celle-ci est levée
        catch (\PDOException $e) {

        /*
         getFile = Récupère le nom du fichier dans lequel l'exception a été créée
         getLine = Récupère le numéro de la ligne où l'exception a été créée
         getMessage = Retourne le message de l'exception
        */

            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();

            // die = fonction exit
            die($msg);
        }

        return $pdo;
    }



//                              |---------------------------- 4/ Fonction closeConnexion ----------------------------|



    // Fonction qui ferme la connexion à la base de donnée
    static function closeConnexion()
    {
        return null;
    }
}