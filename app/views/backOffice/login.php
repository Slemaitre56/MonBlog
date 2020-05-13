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
    <!-- Formulaire pour se connecter au compte Admin -->
    <form class="formInscrip" action="admin.php?action=connexion" method="POST">
        <!-- Pseudo -->
        <div class="inscrip">
            <label for="pseudo">Pseudo : </label>          
            <input type="text" name="pseudo" >
        </div>
        <!-- Mot de passe -->           
        <div class="inscrip">
            <label for="password">Mot de passe :</label>           
            <input type="password" name="password"  >
        </div>        
        <button type="submit" >Se connecter</button>
    </form>
</main>

<!-- Appel le template footer -->
<?php require "./app/views/backOffice/templates/footer.php"; ?>