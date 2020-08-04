<!--  
                                | ---------------------------------- ACCUEIL -------------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->

<!-- Appel des templates head et hearder -->
<?php require "app/views/frontEnd/templates/head.php"; ?>
<?php require "app/views/frontEnd/templates/header.php";?>

<!-- MAIN -->
<main class="container">
    <section class="main">
        <article class="bloc-intro">
            <!-- Introduction -->
            <div class="intro">
                <h1>Bienvenue !</h1>
                <p>Salutation visiteurs et visiteuses ! Et bienvenue ( oui je me répéte et alors
                    ?) sur mon humble blog ! Et oui, je vous invite à partager avec moi ce voyage
                    que j'ai fait il y a plus d'un an maintenant!
                </p>
                <p>Dieu que c'est passé vite ! Et encore aujourd'hui, lorsque je rereregarde ces
                    photos j'ai beaucoup de mal à réaliser que j'y suis vraiment allée !
                </p>

            </div>
                <!-- slider -->
            <div class="slider">
                <ul id="slider-list">
                    <li>
                        <img src="app/public/images/slider1/australie.1.jpg" alt="photo australie"></li>
                    <li>
                        <img src="app/public/images/slider1/australie.2.jpg" alt="photo australie"></li>
                    <li>
                        <img src="app/public/images/slider1/australie.3.jpg" alt="photo australie"></li>
                    <li>
                        <img src="app/public/images/slider1/australie.4.jpg" alt="photo australie"></li>
                    <li>
                        <img src="app/public/images/slider1/australie.5.jpg" alt="photo australie"></li>
                </ul>
            </div>
        </article>
        <article class="bloc-intro">
        <!-- slider -->
            <div class="slider slider2">
                <ul id="slider-list">
                    <li>
                        <img src="./app/public/images/slider2/nouvelleZelande.1.jpg" alt="photo nouvelle-Zelande"></li>
                    <li>
                        <img src="./app/public/images/slider2/nouvelleZelande.2.jpg" alt="photo nouvelle-Zelande"></li>
                    <li>
                        <img src="./app/public/images/slider2/nouvelleZelande.3.jpg" alt="photo nouvelle-Zelande"></li>
                    <li>
                        <img src="./app/public/images/slider2/nouvelleZelande.4.jpg" alt="photo nouvelle-Zelande"></li>
                    <li>
                        <img src="./app/public/images/slider2/nouvelleZelande5.jpg" alt="photo nouvelle-Zelande"></li>
                </ul>
            </div>
            <div class="intro">
                <!-- Introduction -->
                <h2>T'es partis où ?</h2>
                    <p>
                        Bande de petits curieux va ! Comme ma tendre moitié barbue et moi-même sommes
                        partis de l'autre côté du globe pour qu'il puisse réaliser un de ses rêves de
                        gamin: visiter l'Australie, nous avons décidé de faire la nouvelle-Zélande à la
                        suite !</p>
                    <p> 
                        Deux semaines dans l'un deux semaines dans l'autre ! Donc, comme vous êtes super
                        fort en math, un mois entier ! Toute une aventure quoi !</p>
                    <p>
                        Alors oui, c'étais fatiguant, oui son chez-soi nous paraît loin, oui ils ne
                        parlent pas un mot Français et pour se faire comprendre quand soi-même on parle
                        un anglais lycéen ce n'est pas facile !</p>
                    <p>
                        Mais il ne faut surtout pas s'arrêter à ces barrieres ! Sinon, on ne fait jamais
                        rien !
                    </p>
            </div>
        </article>
    </section>
    <aside >
        <!-- API Meteo-->
        <h4>Pour savoir quel temps il fait chez vous, inscrivez le nom de votre ville !</h4>
        <div class="api">
           <span id="error"></span>
            <input
                type="text"
                name="city"
                id="city"
                class="form-control"
                placeholder="Ville - Pays">
            <button id="submit">Chercher</button>
            <div class="show">              
            </div>
        </div>
    </aside>
</main>

<!-- Appel le template footer -->
<?php require "app/views/frontEnd/templates/footer.php"; ?>
<!-- script pour le menu Activ -->
<script>menuAct(0); </script>