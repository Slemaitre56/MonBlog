<!--  
                                | ------------------------------INSCRIPTION ADMIN---------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel le template head -->
<?php include "./app/views/frontEnd/templates/head.php"; ?>

<!-- MAIN -->
<main class="blocInscription">
    <h1 class="titreInscrip">Inscription Administrateur</h1>
                      
    <!-- Formulaire pour s'inscire en tant que Administrateur -->
    <form class="formInscrip" action="admin.php?action=inscription" method="POST">
        <!-- Pseudo -->
        <div class="inscrip">
            <label for="pseudo">Pseudo : </label>          
            <input type="text" name="pseudo" required>
        </div>
        <!-- Email -->
        <div class="inscrip">
            <label for="pseudo">Email : </label>          
            <input type="email" name="email" required>
        </div> 
        <!-- Mot de passe -->  
        <div class="inscrip">
            <label for="password">Mot de passe :</label>           
            <input type="password" name="password" required>
        </div>
        <!-- Confirmation -->    
        <div class="inscrip">
            <label for="confirmation">Confirmation du mot de passe : </label>          
            <input type="password" name="confirmation" required>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</main>

 <!-- Appel le template footer-->   
        <?php require "./app/views/backOffice/templates/footer.php"; ?>
    </body>
</html>