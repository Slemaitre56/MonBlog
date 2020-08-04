<!--  
                                | ------------------------------COMMENTAIREFORM------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<section class="blocCommentaire">
    
    <form class="zoneText" action="newComment&articleId=<?= $_GET['id'] ?>" method="POST" accept-charset="utf-8">
            <!-- Pseudo -->
            <input id="pseudo" type="text" name="user_pseudo" size="50" maxlength="250" required="required" placeholder="Votre pseudo"/>
            </label>
            <!-- Commentaire -->
            <textarea id="commentaire" name="message" rows="10" cols="30" required="required"></textarea>
            </label>
            <input class="btnCommentaire" type="Submit" name="submit" value="Envoyer un commentaire"/>
    </form>
                    
    <div class="showCommentaire">
        <!-- Si il y a des commentaires alors j'affiche pour chaque -->
        <?php
            if (!empty($article["comments"])):
                foreach ($article["comments"] as $comment) :
        ?>
        <div class="contenuCom">
            <p class="com"><span class="spanCom">Ecrit par </span>: <?= $comment->getUserPseudo() ?></p>           
            <p class="com"><span class="spanCom">Daté du </span>: <?= $comment->getCreationDate() ?></p>
            <p class="com"><span class="spanCom">Commentaire </span>: </p>
            <p class="com"><?= $comment->getMessage() ?></p>
        </div>
        <?php
       
                endforeach;
            else:
        ?>
        <!-- Sinon j'affiche un message -->
            <i>Aucun commentaire n'a encore été publié</i>
        <?php
            endif;
        ?>
    </div>
</section>





        
   
    