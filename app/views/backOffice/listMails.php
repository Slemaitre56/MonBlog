<!--  
                                | ---------------------------------ANCIEN ADMIN------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include './app/views/frontEnd/templates/head.php'; ?>
<?php include './app/views/backOffice/templates/header.php'; ?>

<!-- MAIN -->
<main class="container">
    <h1 class="titreAdmin">Anciens Articles</h1>
    <!-- Tableau qui liste tous les articles du blog -->
    <div class="tableau">
        <table>
            <tr class="hautTableau">
                <td>Titre de l'article</td>
                <td>Nom de la page</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            <!-- Si il existe des articles alors j'affiche avec une boucle(pour chaque) -->
            <?php 
            if (!empty($articlesAllList)):
                foreach ($articlesAllList as $articleAll) :
            ?>
            <tr>
                <!-- Pour chaque article je récupère avec un getter(voir models article) le titre, la refpage, le id-->
                <td><?= $articleAll->getTitle() ?></td>
                <td><?= $articleAll->getRefPage() ?></td>
                <td>
                    <a title="Modifier cet article" href="admin.php?action=modifier&id=<?= $articleAll->getId(); ?>">
                        <i class="material-icons" style="font-size:36px">cached</i>
                    </a>
                </td>
                <td>
                    <a title="Supprimer cet article" href="admin.php?action=supprimer&id=<?= $articleAll->getId(); ?>">
                        <i class="material-icons" style="font-size:36px">delete</i>
                    </a>
                </td>
            </tr>
            <?php
                 endforeach;
            else:
            ?>
            <!-- Sinon j'affiche un message -->
            <i>Aucun article n'a encore été publié</i>
            <?php
            endif;
            ?>
        </table>
    </div>
</main>   

<!-- Appel le template footer -->
<?php include './app/views/backOffice/templates/footer.php'; ?>
<script>menuAct(3); </script>