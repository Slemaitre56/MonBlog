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
    <h1 class="titreAdmin">Anciens mails</h1>
    <!-- Tableau qui liste tous les mails du blog -->
    <div class="tableau">
        <table>
            <tr class="hautTableau">
                <td>Adresse Mail</td>
                <td>Nom de l'utilisateur</td>
                <td>Messager</td>

            </tr>
            <!-- Si il existe des mails alors j'affiche avec une boucle(pour chaque) -->
            <?php 
            if (!empty($mailsAllList)):
                foreach ($mailsAllList as $mailAll) :
            ?>
            <tr>
                <!-- Pour chaque mail je récupère avec un getter(voir models mail) le mail, le nom ... -->
                <td><?= $mailAll->getEmail() ?></td>
                <td><?= $mailAll->getNom() ?></td>
                <td><?= $mailAll->getMessage() ?></td>
            </tr>
            <?php
                 endforeach;
            else:
            ?>
            <!-- Sinon j'affiche un message -->
            <i>Aucun mail n'a encore été publié</i>
            <?php
            endif;
            ?>
        </table>
    </div>
</main>   

<!-- Appel le template footer -->
<?php include './app/views/backOffice/templates/footer.php'; ?>
<script>menuAct(2); </script>