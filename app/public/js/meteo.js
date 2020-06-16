/*
                                | -------------------------------API METEO JQUERY---------------------------------- | 
                                |                                                                                   |
                                |-----------------------------------------------------------------------------------|
*/


    // déclaration d'un événement click sur le bouton de l'api     
    $("#submit").click(function () {

        // déclaration de variable pour récupérer la valeur de l'input
        let city = $("#city").val();
        // déclaration de variable pour récupérer la valeur de la clé mit ans le fichier .creds.js      
        let token = creds.token;

        // Si la variable city est différent de vide
        if(city != "") {

            // AJAX : Asynchronous JavaScript + XML
            $.ajax({

                // Une api est une url - via les paramètres on récupère les données
                url: "http://api.openweathermap.org/data/2.5/weather?q=" + city + "&units=metric" +
                        "&APPID=" + token,

                // On récupère les données       
                type: "GET",

                // On choisi la méthode jsonp( json avec formatage)
                dateType: "jsonp",
                
                // Si tout fonctionne alors j'affiche le resultat
                success: function (data) {
                    let widget = show(data);
                    $(".show").html(widget);
                    $("#city").val("");
                }
            });
        }
        // Sinon j'affiche un message d'erreur
        else {
            $("#error").html("Inscivez le nom d'une ville ou d'un pays !");
            
            
        }
    });

    // Retourne les resultats sélectionnées dans la dicumentationde la bases de donnée(openWeathermap)     
    function show(data){
        
        return  "<h2>La méteo pour : " + data.name + ", " + data.sys.country + "</h2>" +
                "<h3>Méteo: <img src='http://openweathermap.org/img/wn/" +data.weather[0].icon + ".png'>" + data.weather[0].main + "</h3>" +
                "<h3>Temperature: " + data.main.temp + " &deg;C</h3>";
                
    }





