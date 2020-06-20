<!--  
                                | -------------------------------SUPPRIMER ADMIN----------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include 'app/views/frontEnd/templates/head.php'; ?>
<?php include 'app/views/backOffice/templates/header.php'; ?>

<!-- MAIN -->
<main class="container">
    <h1 class="titreAdmin">Suppresion de votre article</h1>
    <!-- Formulaire pour supprimer un article -->
    <form class="formSuppr" action="admin.php?action=delete&id=<?= $_GET["id"] ?>" method="POST">
        <div class="blocTitreSuppr">
            <h2 class="questSuppr">Etes-vous sûr de vouloir suprimer cet article ?</h2>
            <input class="btnSuppr" type="submit" name="delete" value="Oui,j'en suis sûr !">
        </div>
    </form>
</main>

<!-- Appel le template footer -->
        <?php include 'app/views/backOffice/templates/footer.php'; ?>
        <script> menuAct(1); </script>
    </body>
</html>