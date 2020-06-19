<!--  
                                | ---------------------------------HEADER ADMIN------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->
<body>
    <header>
        <!-- Image SVG -->
        <div class="logo">
            <a title="Retour à la page d'accueil" href="accueil"><img src="/../../app/public/images/koala1.svg" alt="image svg"></a>
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
                            <a title="Créer un nouvel Article" href='admin.php?action=editer'> Nouvel article
                            </a>
                        </li>
                        <li class="nav">
                            <a title="Voir la liste des articles" href='admin.php?action=ancien'> Anciens Articles
                            </a>
                        </li>
                        <li class="nav">
                            <a title="Voir la liste des articles" href='admin.php?action=ancien'> Emails Reçus
                            </a>
                        </li>
                    </ul>
            </div>
        </nav>
    </header>