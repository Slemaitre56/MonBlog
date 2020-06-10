<!--  
                                | ---------------------------------EDIT ADMIN------------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include './app/views/frontEnd/templates/head.php'; ?>
<?php include './app/views/backOffice/templates/header.php';?>


<!-- MAIN -->
<main class="container">
    <!-- ERRORS -->
    <div class="errorEditer">
    <?php 
    if(!empty($errors)){
        foreach ($errors as $error) {
        echo $error;
    }
    }
    ?>
    </div>  
    <h1 class="titreAdmin">Nouvel article</h1>
    <!-- Formulaire pour créer un nouvel article -->
    <form class="formAdmin" action="admin.php?action=create" method="POST" enctype="multipart/form-data" >
        <div class="blocTitrePost">
            <!-- Titre -->
            <input
                class="titrePost"
                type="text"
                name="title"
                placeholder="Titre de l'article"
                required="required">
            <!-- Image -->
            <div class="file">
                <label for="file">
                    Insérer une image :</label>
                <input type="file" name="image" required="required">
            </div>
        </div>
        <div class="messagePost">
            <!-- Choix de la page -->
            <div class="choixPage">
                <label for="ref_page">Choisir la page :</label>
                <?php if(isset($_REQUEST['action']) ) : ?>
                <select name="ref_page" id="refPage" required="required">
                    <option value="Australie">Australie</option>
                    <option value="Nouvelle-zelande">Nouvelle-Zélande</option>
                    <option value="Trucs_et_astuces">Trucs et Astuces</option>
                </select>
                <?php endif ?>
            </div>
            <!-- Message -->
            <div>
                <textarea
                    class="texteAdmin"
                    name="content"
                    placeholder="Veuillez écrire le contenu de l'article *"
                    required="required"></textarea>
            </div>
        </div>
        <div class="btnAdmin">         
            <input type="submit" value="Poster!">
        </div>
    </form>
</main>

<!-- Appel des templates footer -->
<?php include './app/views/backOffice/templates/footer.php'; ?>
<script>menuAct(0); </script>
