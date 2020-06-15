<!--  
                                | ---------------------------------HEADER INDEX------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->
<!-- cookie -->
<?php require_once "./app/views/frontEnd/cookie/cookieForm.php" ?>
<body>
    <header>
        <!-- Image SVG -->
        <div class="logo">
            <a title="Retour à la page d'accueil" href="?action=accueil"><img src="/../../app/public/images/koala1.svg" alt="image svg"></a>
        </div>
        <!-- Menu burger -->
        <nav class="menu-principal">
            <div class="menu">
                <input type="checkbox" id="menu-mobile" role="button">
                    <label for="menu-mobile" class="menu-mobile">
                        <img src="app/public/images/menu.svg">
                    </label>
                    <!-- Menu principal -->
                        <ul id="menuActive" class="liens-nav">                         
                            <li class="nav">
                                <a title="Accueil" href='accueil'> Accueil</a>
                            </li>
                            <li class="nav">
                                <a title="Australie" href='australie'> Australie</a>
                            </li>
                            <li class="nav">
                                <a title="Nouvelle-Zelande" href='?action=nouvelle-zelande'> Nouvelle-Zélande</a>
                            </li>
                            <li class="nav">
                                <a title="Trucs et Astuces" href='?action=trucs_et_astuces'> Trucs et astuces</a>
                            </li>
                            <li class="nav">
                                <a title="Contact" href='?action=contact'> Contact</a>
                            </li>
                        </ul>
            </div>
        </nav>
    </header>