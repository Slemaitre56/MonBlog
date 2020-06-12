<?php
namespace Projet\Models;
/*
                                | -------------------------------CLASS COMMENTMANAGER------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction createACommentaire                        |                              
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
*/


class CommentManager extends DbConnexion
{

    

//                              |--------------------------- 1/ Fonction createCommentaire -----------------------------|



// Fonction créer un commentaire via la class Commentaire
    static function createComment(Comment $comment): Comment
    {
        // Pour créer un commentaire
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();

        // On insére dans la table commentaire le pseudo, la date de création, la date de mise à jour, le article_id
        $request = "INSERT INTO commentaire (user_pseudo, creation_date, update_date, message, article_id) VALUES ";
        $request .= '( "' . $comment->getUserPseudo() . '", "' . $comment->getCreationDate() . '", "' . $comment->getUpdateDate() . '", "' . $comment->getMessage() . '", "' . $comment->getArticleId() . '");';
        
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        // On insére dans la variable $lastId l'identifiant de la dernière valeur
        $lastId = $db->lastInsertId();

        $comment->setId($lastId);
        $db = DbConnexion::closeConnexion();

        return $comment;      
    }
}

