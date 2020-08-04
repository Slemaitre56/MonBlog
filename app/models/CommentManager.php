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
        $request = "INSERT INTO commentaire (user_pseudo, creation_date, update_date, message, article_id) VALUES (:user_pseudo, :creation_date, :update_date, :message, :article_id)";
    
        
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute(
            [
            'user_pseudo'=> htmlentities($comment->getUserPseudo()),
            'creation_date'=> htmlentities($comment->getCreationDate()),
            'update_date'=> htmlentities($comment->getUpdateDate()),
            'message'=> htmlentities($comment->getMessage()),
            'article_id'=> htmlentities($comment->getArticleId())
            ]           
        );

        // On insére dans la variable $lastId l'identifiant de la dernière valeur
        $lastId = $db->lastInsertId();

        $comment->setId($lastId);
        $db = DbConnexion::closeConnexion();

        return $comment;      
        return $comment;  
    }
}

