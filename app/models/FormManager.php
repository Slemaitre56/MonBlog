<?php 
namespace Projet\Models;


/*
                                | ----------------------------------FORMMANAGER------------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction contact                                   |
                                |                                                                                   |                                                             
                                |-----------------------------------------------------------------------------------|
*/

class FormManager
{

        static function createContact(Form $form)
    {
        // Pour créer un commentaire
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();
        $errors = [];
        if( empty($form->getEmail()) || empty($form->getNom()) || empty($form->getMessage())){
            $errors[] = 'Tous les Champs sont OBLIGATOIRES !!!';
        }
        if(!filter_var($form->getEmail(), FILTER_VALIDATE_EMAIL)){
            $errors[] = 'L\'Adresse Mail n\'est pas Valide !!!';
        }else{
          $request = "INSERT INTO contact (email, nom, message) VALUES (:email, :nom, :message)";
        
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute(
            [
                'nom'=>htmlentities($form->getEmail()),
                'email'=>htmlentities($form->getNom()),
                'message'=>htmlentities($form->getMessage()),
            ]
        );

        // On insére dans la variable $lastId l'identifiant de la dernière valeur
        $lastId = $db->lastInsertId();

        $form->setId($lastId);
        $db = DbConnexion::closeConnexion();  
        }
        return $errors;
    }



    // Fonction afficher tous les mails
    public function readAllContact(): array
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();

        // Après avoir tout sélectionné dans la table contact
        // On le stoocke dans un tableau
        $mailsAllList = [];

        // On séléctionne tout dans la table contact
        $request = "SELECT * FROM contact" ;

        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        /*
         On crée une boucle tant que ...
         FETCH-ASSOC = mode de récupération de données qui retourne un tableau indéxé par colonne
         Ne permet pas d'appeler plusieurs colonnes du même nom
        */
        while ($mailsFromDb = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            // On instancie un nouvel contact
            $mailAll = new Form($mailsFromDb['email'], $mailsFromDb['nom'], $mailsFromDb['message']);
            $mailAll->setId($mailsFromDb['id']);

            $mailsAllList [] = $mailAll;
        }

        $db = DbConnexion::closeConnexion();

        return $mailsAllList;
    }
}
// }




