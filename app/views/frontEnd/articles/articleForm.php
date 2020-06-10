<!--  
                                | ---------------------------------ARTICLEFORM------------------------------------- | 
                                |                           Affiche un article unique                               |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include 'app/views/frontEnd/templates/head.php'; ?>
<?php include 'app/views/frontEnd/templates/header.php';?>

<!-- MAIN -->
<main class="containerDeux">
    <section class="blocArticles">
        <article class="oneArticle">
       
            <h1 class="titreOneArticle"><?= $article["article"]->getTitle() ?></h1>
            <img class="imageOneArticle" src="app/public/images/<?= $article["article"]->getImage() ?>">
            <p class="contentOneArticle"><?= $article["article"]->getContent() ?></p>
        </article>
    </section>
</main>

