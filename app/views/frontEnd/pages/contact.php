<!--  
                                | -----------------------------------CONTACT--------------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php require "./app/views/frontEnd/templates/head.php"; ?>
<?php require "./app/views/frontEnd/templates/header.php"; ?>

<!-- MAIN -->
<main class="containerTrois">
    <h1>Contact</h1>
    <p class="ssTitre">Vous avez une question ? Vous voulez me dire à quel point
        vous m'adorez ? Alors laissez moi un message et je vous répondrai dès que
        possible !</p>
        <!-- Affiche les messages d'erreurs voir FormulaireManager-->
    <?php  
        if(array_key_exists('errors', $_SESSION)) : 
        ?>
    <div class="alert">
        <?= implode('<br>', $_SESSION['errors']); ?>
    </div>
    <?php 
        endif; 
    ?>
    <?php  
        if(array_key_exists('success', $_SESSION)) : 
        ?>
    <div class="alert">
        Votre message a bien été envoyé !
    </div>
    <?php 
        endif; 
    ?>

    <!-- Formulaire du contact  -->
    <form class="contact" action="?action=form" method="POST">
        <div class="infosPerso">
            <!-- Nom -->
            <label class="labelContact" for="nom">Nom :</label>
            <input
                type="text"
                name="nom"
                class="nom"
                placeholder="Nom"
                value="<?= isset($_SESSION['inputs']['nom']) ? $_SESSION['inputs']['nom'] : ''; ?>">
            <label class="labelContact" for="email">Email :</label>
            <!-- Email -->
            <input
                type="email"
                name="email"
                class="email"
                placeholder="Email"
                value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
            <!-- Message -->
            <textarea
                name="message"
                id="message"
                cols="30"
                rows="10"
                placeholder="Votre message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>

            <input type="submit" class="submitContact">

        </div>
    </form>
    <!-- Détruit de contenu -->
    <?php   
    unset($_SESSION['inputs']); 
    unset($_SESSION['success']);
    unset($_SESSION['errors']);  
?>
</main>
<?php include 'app/views/frontEnd/templates/footer.php'; ?>
<script>menuAct(4);</script>