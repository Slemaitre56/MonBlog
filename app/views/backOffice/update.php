<!--  
                                | --------------------------------MODIFIER ADMIN----------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php include 'app/views/frontEnd/templates/head.php'; ?>
<?php include 'app/views/backOffice/templates/header.php'; ?>
<!-- ERRORS -->
<div class="errorEditer">
    <?php   
    if(!empty($errors)){
        foreach ($errors as $error) 
        {
        echo $error;
        }
    }
    ?>
</div>
<!-- MAIN -->
<div class="container">
    <h1 class="titreAdmin">Modifier article</h1>
      <!-- Formulaire pour modifier un article -->
    <form class="formAdmin" action="admin.php?action=update&id=<?= $_GET["id"] ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">        
        <div class="blocTitrePost">
            <!-- Titre -->
            <input
                class="titrePost"
                type="text"
                name="title"
                placeholder="Titre de l'article*"
                value="<?= $article["article"]->getTitle() ?>"
                required="required">
            <!-- Image -->    
            <div class="file">
                <label for="file">
                    Insérer une image</label>
                    <input type="file" name="image" required="required">
            </div>
        </div>
        <div class="messagePost">
            <!-- Choix de la page -->
            <div class="choixPage">
                <label for="ref_page">Choisir la page :</label>
                <?php 
                    if(isset($_REQUEST['action']) ) : 
                ?>
                <select name="ref_page" id="refPage" required="required">
                    <option value="<?= $article["article"]->getRefPage() ?>"><?= $article["article"]->getRefPage() ?></option>
                    <option value="Australie">Australie</option>
                    <option value="Nouvelle-zelande">Nouvelle-Zélande</option>
                    <option value="Trucs_et_astuces">Trucs et Astuces</option>
                </select>
                <?php 
                endif 
                ?>
            </div>
            <div>
                <!-- Message -->
                <textarea
                    class="texteAdmin"
                    name="content"
                    placeholder="Veuillez écrire le contenu de l'article *"
                    value=""
                    required="required"><?= $article["article"]->getContent(); ?></textarea>
            </div>
        </div>
        <div class="btnAdmin">          
            <input type="submit" value="Modifier !" name="updateArticle">
        </div>
    </form>
</div>

<!-- Appel le template footer -->
<?php include 'app/views/backOffice/templates/footer.php'; ?>
