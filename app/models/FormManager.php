<?php 
namespace Projet\Models;

use SendGrid;

/*
                                | ----------------------------------FORMMANAGER------------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction contact                                   |
                                |                                                                                   |                                                             
                                |-----------------------------------------------------------------------------------|
*/
require __DIR__ . '<PATH_TO>/vendor/autoload.php';
class FormManager
{

    static function contact(){
    
        $errors = [];

        if(!array_key_exists('nom', $_POST) || $_POST['nom'] == ''){
            $errors['nom'] = "Vous n'avez pas renseigné votre nom";
        }

        if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Vous n'avez pas renseigné correctement votre email";
        }

        if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
            $errors['message'] = "Vous n'avez pas renseigné votre message";
        }

        if(!empty($errors)){
            
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('location: index.php?action=contact');
        }else{
            $_SESSION['success'] = 1;

            // data
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            var_dump($nom);
            // Contenu
            $from = new SendGrid\Email("Stéphanie Lemaitre","stephanie.lemaitre56@gmail.com");
            $subject = "Formulaire de contact";
            $to = new SendGrid\Email("Stéphanie Lemaitre","dev.stephaniel@gmail.com");
            $content = new SendGrid\Content("text\html","
            Email : {$email}<br>
            Utilisateur : {$nom}<br>
            Message : {$message}<br>
            ");

            // Envoi du mail
            $mail = new SendGrid\Mail($from,$subject,$to,$content);
            $apiKey = getenv("SENDGRID_API_KEY");
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);
            echo $response->statusCode();
            echo $response->headers();
            echo $response->body();
            
            header('location: index.php?action=contact');
        }
    }
}




