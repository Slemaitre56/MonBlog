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

        // 'data' qui renseigne sur le chemain de la base de donnée
            $host = 'mysql:host=localhost';
            $dbname = 'dbname=gretaxao_stephanielemaitre';
            $login = 'gretaxao_stephanielemaitre';
            $pwd = 'StephanieLemaitre2020';

            // Commande à exécuter lors de la connexion au serveur MySQL. Sera automatiquement ré-exécuté lors d'une reconnexion.
            $arrExtraParam= array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

            // pdo = php data objet
            $pdo = new \PDO($host, $dbname, $login, $pwd);
        
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