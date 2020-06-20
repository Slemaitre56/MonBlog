<!--  
                                | ------------------------------CONNEXION ADMIN------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php require "./app/views/frontEnd/templates/head.php"; ?>

<!-- MAIN -->
<main class="blocInscription">
    <!-- Affiche les messages d'erreurs voir FormulaireManager-->
      
    <h1 class="titreInscrip">Connectez-vous</h1>
    <div class="errorLogin">
    <?php 
    if(!empty($error)){
        echo $error;
    }?>
    </div>
    <!-- Formulaire pour se connecter au compte Admin -->
    <form class="formInscrip" action="admin.php?action=connexion" method="POST">
        <!-- Pseudo -->
        <div class="inscrip">
            <label for="pseudo">Pseudo : </label>          
            <input type="text" name="pseudo" required>
        </div>
        <!-- Mot de passe -->           
        <div class="inscrip">
            <label for="password">Mot de passe :</label>           
            <input type="password" name="password" required>
        </div>        
        <button type="submit" >Se connecter</button>
    </form>
</main>

<!-- Appel le template footer -->
        <?php require "./app/views/backOffice/templates/footer.php"; ?>
    </body>
</html>