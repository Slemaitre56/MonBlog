<!--  
                                | ---------------------------------FOOTER ADMIN------------------------------------ | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
-->
        <footer>
            <!-- CGU + Site map -->
            <p>
                &copy;2020 Monblog -
                <a title="CGU" href='cgu'>Conditions générales d'utilisation -</a>
            </p>
            <p>
                <a title="Site Map" href='siteMap'>Site Map</a>
            </p>

            <!-- Réseaux sociaux -->
            <div class="soc-icons">
                <span>Me suivre:</span>
                <a title="Twitter" href="https://twitter.com/login?lang=fr">
                    <img src="app/public/images/icon-1.jpg" alt="icon"></a>
                <a title="Facebook" href="https://www.facebook.com">
                    <img src="app/public/images/icon-2.jpg" alt="icon"></a>
            </div>
        </footer>
            <!-- scripts js -->
            <script>
            let phpVars = {};
            phpVars["TOKEN"] = "<?= $_ENV["TOKEN"]; ?>"        
            </script>
            <script src="app/public/js/meteo.js"></script>
            <script src="app/public/js/plugin.js"></script>
            <script src="app/public/js/active.js"></script>
            <script src="app/public/js/btnTop.js"></script>
            <script src="app/public/js/modal.js"></script>
    </body>
</html>