<?php
namespace Projet\Models;
/*
                                | -----------------------------------ARTICLEMANAGER-------------------------------- | 
                                |                                                                                   |
                                |                             1/ Fonction createArticle                             |
                                |                             2/ Fonction readArticles                              |
                                |                             3/ Fonction readOneArticle                            |
                                |                             4/ Fonction readAllArticles                           |
                                |                             5/ Fonction updateArticle                             |
                                |                             6/ Fonction deleteArticle                             |                                
                                |                             7/ Fonction addImage                                  |
                                |-----------------------------------------------------------------------------------|
*/


class ArticleManager extends DbConnexion
{

    

//                              |--------------------------- 1/ Fonction createArticle -----------------------------|



    // Fonction créer un article via la class Article
   public static function createArticle(Article $article)
   {
    $errors = [];
    $error = ArticleManager::addImage($article, "create");
    if($error){
        array_push($errors, $error);
    }
    return $errors;
}



//                              |---------------------------- 2/ Fonction readArticles -----------------------------|



    // Fonction afficher un/des article/s par rapport à la page(ref_page)
    public function readArticles($pageName): array
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();
        /*
         Après avoir tout sélectionné selectionné dans la table article
         On le stoocke dans un tableau
        */
        $articlesList = [];

        // On séléctionne tout dans la table article dans la colonne ref_pag = $pageName
        $request = "SELECT * FROM article WHERE ref_page like '" . $pageName . "';" ;

        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        /*
         On crée une boucle tant que ...
         FETCH-ASSOC = mode de récupération de données qui retourne un tableau indéxé par colonne
         Ne permet pas d'appeler plusieurs colonnes du même nom
        */

        while($articlesFromDb = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            // On instancie un nouvel article
            $article = new Article($articlesFromDb['title'], $articlesFromDb['content'], $articlesFromDb['image'], $articlesFromDb['ref_page']);
            $article->setId($articlesFromDb['id']);
            $article->setCreationDate($articlesFromDb['creation_date']);
            $article->setUpdateDate($articlesFromDb['update_date']);

            $articlesList [] = $article;
        }

        $db = DbConnexion::closeConnexion();

        return $articlesList;
    }



//                              |-------------------------- 3/ Fonction readOneArticle ----------------------------|



    // Fonction afficher un seul article
    public static function readOneArticle()
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();
        // Après avoir tout sélectionné selectionné dans la table article
        // On le stoocke dans un tableau
        
        $request = "SELECT article.content,article.id, article.title, article.image, article.ref_page, article.creation_date, article.update_date,commentaire.commentaire_id, commentaire.user_pseudo, commentaire.message, commentaire.creation_date FROM article LEFT JOIN commentaire ON article.id = commentaire.article_id  WHERE article.id = :id";
        
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        
        $params= array("id"=>$_GET['id']);
        
        $stmt->execute($params);

        $articleFromDb = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $article = [];

        $article['comments'] = [];
        $article['comments'] = [];




foreach ( $articleFromDb as $result) {

    if (count($article) < 2) {

        // On instancie un nouvel article

        $art = new Article($result['title'], $result['content'], $result['image'], $result['ref_page']);
        $art->setId($result['id']);
        $art->setCreationDate($result['creation_date']);
        $art->setUpdateDate($result['update_date']);

        // On push $art dans un array
        $article["article"] = $art;

    }

    // On instancie un commentaire
    $comment = new Comment($result['user_pseudo'],$result['message'],$result['id']);
    $comment->setId($result['commentaire_id']);
    $comment->setCreationDate($result['creation_date']);
    $comment->setUpdateDate($result['update_date']);

    // On push $comment dans un array
    $article["comments"][] = $comment;

    }
    return $article;
        
    }



//                              |--------------------------- 4/ Fonction readAllArticles --------------------------|



    // Fonction afficher tous les articles
    public function readAllArticles(): array
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();

        // Après avoir tout sélectionné dans la table article
        // On le stoocke dans un tableau
        $articlesAllList = [];

        // On séléctionne tout dans la table article
        $request = "SELECT * FROM article" ;

        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        /*
         On crée une boucle tant que ...
         FETCH-ASSOC = mode de récupération de données qui retourne un tableau indéxé par colonne
         Ne permet pas d'appeler plusieurs colonnes du même nom
        */
        while ($articlesFromDb = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            // On instancie un nouvel article
            $articleAll = new Article($articlesFromDb['title'], $articlesFromDb['content'], $articlesFromDb['image'], $articlesFromDb['ref_page']);
            $articleAll->setId($articlesFromDb['id']);
            $articleAll->setCreationDate($articlesFromDb['creation_date']);
            $articleAll->setUpdateDate($articlesFromDb['update_date']);

            $articlesAllList [] = $articleAll;
        }

        $db = DbConnexion::closeConnexion();

        return $articlesAllList;
    }



//                              |-------------------------- 5/ Fonction updateArticle -----------------------------|



    // Fonction mettre à jour un article via la class Article
    public static function updateArticle(Article $article)
    {
        $errors = [];
        $error = ArticleManager::addImage($article, "update");
        if($error){
            array_push($errors, $error);
        }
        return $errors;
    }



//                              |-------------------------- 6/ Fonction deleteArticle ----------------------------|



    // Fonction supprimer un article via la class Article
    public static function deleteArticle(int $id)
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();

        // On supprime un article avec son id
        $request = "DELETE FROM article WHERE id =:id";
        $params= array("id"=>$id);

        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute($params);

        $db = DbConnexion::closeConnexion();
        
    }


//                              |-------------------------- 7/ Fonction addImage ----------------------------|



    public static function addImage($article, $action)
    {
        $db = DbConnexion::openConnexion();
        
        if (!empty($_FILES)) {
            $image = $_FILES["image"]["name"];
            $imageTmp = $_FILES["image"]["tmp_name"];
            $imageSize = $_FILES["image"]["size"];
            // On récupére tout après le .
            $extention = explode(".", $image);
            // Récupère l'extention et la met en minuscule
            $newExtention = strtolower(end($extention));
            // On met les extention autorisés dans un tableau
            $tableau_ext = array("jpg", "png", "jpeg");
    
            if (in_array($newExtention, $tableau_ext)) {
                // 500Mb
                if ($imageSize < 1000000) {
                    $imageDestination = "app/public/images/".$image;
                    // Récupère l'image dans un dossier temporaire vers sa destination
                    move_uploaded_file($imageTmp, $imageDestination);
                    if($action === "create"){
                        // On insére dans la table 'article' le titre, l'image, la date de création, la
                        // date de mise à jour, le contenu, la ref-page
                        $request = "INSERT INTO article (title, image, creation_date, update_date, content, ref_page) VALUES ";
                        $request .= '( "'.$article->getTitle().'", "'.$image.'","'.$article->getCreationDate().'", "'.$article->getUpdateDate().'", "'.$article->getContent().'", "'.$article->getRefPage().'");';
        
                        // On prépare et exécute la requête
                        $stmt = $db->prepare($request);
                        $stmt->execute();
        
                        // On insére dans la variable $lastId l'identifiant de la dernière valeur
                        $lastId = $db->lastInsertId();
        
                        $article->setId($lastId);
                        $db = DbConnexion::closeConnexion();
                        
                    }
                    elseif($action === "update"){
                        // On fait une mise à jour dans la table article sur le contenu, le titre, l'image, la ref_page, la date
                        $request = "UPDATE article SET content ='".$article->getContent()."', title ='".$article->getTitle()."', image ='".$image ."',ref_page ='".$article->getRefPage()."', update_date ='".$article->getUpdateDate()."' WHERE id =:id ";
                        $params= array("id"=>$_GET['id']);                      
                        // On prépare et exécute la requête
                        $stmt = $db->prepare($request);
                        $stmt->execute($params);
                        $db = DbConnexion::closeConnexion();
                        unset($_POST['title']);
                        unset($_POST['content']);                     
                    }
                } else {
                    $errors = "Votre image est trop lourde ! 1Mo max !";
                    
                }
            } else {
                $errors = "Le format de votre image est incorrect ! jpg, png et jpeg uniquement !";
            }
        }
    }
}