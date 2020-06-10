<?php
namespace Projet\Models;
/*
                                | -------------------------------CLASS COMMENTMANAGER------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction createACommentaire                        |
                                |                             2/ Fonction readCommentaires                          |
                                |                             3/ Fonction updateCommentaire                         |
                                |                             6/ Fonction deleteCommentaire                         |                                
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



//                              |--------------------------- 2/ Fonction readCommentaires -----------------------------|



// Fonction afficher un/des commentaire/s par rapport à la page(article_id)
    // function readComments(): array
    // {
    //     // On se connecte à la base de donnée
    //     $db = DbConnexion::openConnexion();

    //     // Après avoir tout sélectionné selectionné dans la table commentaire
    //     // On le stoocke dans un tableau
    //     $commentsList = [];

    //     $request = "SELECT * FROM article WHERE id =:id INNER JOIN commentaire on article.id = commentaire.article_id";
    //     $params= array("id"=>$_GET['id']);
    //     // On prépare et exécute la requête
    //     $stmt = $db->prepare($request);
    //     $stmt->execute($params);

    //     /*
    //     FETCH-ASSOC = mode de récupération de données qui retourne un tableau indéxé par colonne 
    //     Ne permet pas d'appeler plusieurs colonnes du même nom
    //     */

    //     while ($commentsFromDb = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    //         // On instancie Commentaire
    //         $comment = new Comment($commentsFromDb['user_pseudo'],$commentsFromDb['content'],$commentsFromDb['article_id']);
    //         $comment->setId($commentsFromDb['id']);
    //         $comment->setCreationDate($commentsFromDb['creation_date']);
    //         $comment->setUpdateDate($commentsFromDb['update_date']);

    //         $commentsList [] = $comment;
    //     }

    //     $db = DbConnexion::closeConnexion();

    //     return $commentsList;
    // }



//                              |--------------------------- 3/ Fonction updateCommentaire -----------------------------|



// Fonction mettre à jour un commentaire via la class Commentaire
    // function updateComment(Comment $comment): Comment
    // {
    //     // On se connecte à la base de donnée
    //     $db = DbConnexion::openConnexion();

    //     $request = "UPDATE commentaire SET content ='" . $comment->getContent() ."',  update_date =' ". $comment->getUpdateDate() ."' WHERE id =:id ";
    //     $params= array("id"=>$_GET['id']); 

    //     // On prépare et exécute la requête
    //     $stmt = $db->prepare($request);
    //     $stmt->execute($params);

    //     $db = DbConnexion::closeConnexion();

    //     return $comment;
    // }



//                              |--------------------------- 4/ Fonction deleteCommentaire -----------------------------|



// Fonction supprimer un commentaire via la class Commentaire
    // static function deleteComment($comment): Comment
    // {
    //     // On se connecte à la base de donnée
    //     $db = DbConnexion::openConnexion();

    //     $request = "DELETE FROM commentaire WHERE id =:id";
    //     $params= array("id"=>$_GET['id']);

    //     // On prépare et exécute la requête
    //     $stmt = $db->prepare($request);
    //     $stmt->execute();

    //     $db = DbConnexion::closeConnexion();

    //     return $comment;
    // }
}

