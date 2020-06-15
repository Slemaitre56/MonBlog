<?php 
namespace Projet\Models;

/*
                                | ----------------------------------FORMMANAGER------------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction contact                                   |
                                |                                                                                   |                                                             
                                |-----------------------------------------------------------------------------------|
*/

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
            $email = $_POST['email'];
            $mail ='stephanie.lemaitre56@gmail.com';
            $message = "<h4> Contenu du message : </h4>".$_POST["message"];
            $headers  = 'De: '.$email."\r\n".
            'Reply-To: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($mail,'Formulaire de contact', $message, $headers);
            header('location: index.php?action=contact');
        }
    }
}




