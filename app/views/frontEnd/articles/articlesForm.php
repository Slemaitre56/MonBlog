<!--  
                                | ---------------------------------ARTICLEFORM------------------------------------- | 
                                |                      Affiche tous les article sur une page                        |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include 'app/views/frontEnd/templates/head.php'; ?>
<?php include 'app/views/frontEnd/templates/header.php'; ?>

<!-- MAIN -->
<main class="containerDeux">
    <section class="blocArticles">
        <!-- Si il y a des articles alors j'affiche pour chacun en récupérent via des getters -->
        <?php
            if (!empty($articlesList)):
                foreach ($articlesList as $article) :
        ?>
        <article class="article">
            <a title="Article" href="article&id=<?= $article->getId(); ?>"><img class="imgArticle" src="app/public/images/<?= $article->getImage() ?>"></a>
            <h5><?= $article->getTitle() ?></h5>
            <p class="articleDate">Daté du :
                <?= $article->getCreationDate() ?></p>
            <p class="articleContent">
                <?= $article->getContent() ?></p>
            <a class="savoir" title="Article" href="article&id=<?= $article->getId(); ?>">En savoir +</a>
        </article>
        <?php
                endforeach;
            else:
        ?>
        <i>Aucun article n'a encore été publié</i>
        <?php
            endif;
        ?>
    </section>
</main>

