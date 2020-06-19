<?php 
namespace Projet\Models;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// use SendGrig;

/*
                                | ----------------------------------FORMMANAGER------------------------------------ | 
                                |                                                                                   |
                                |                             1/ Fonction contact                                   |
                                |                                                                                   |                                                             
                                |-----------------------------------------------------------------------------------|
*/

class FormManager
{

    // static function contact(){
    
        // $errors = [];

        // if(!array_key_exists('nom', $_POST) || $_POST['nom'] == ''){
        //     $errors['nom'] = "Vous n'avez pas renseigné votre nom";
        // }

        // if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //     $errors['email'] = "Vous n'avez pas renseigné correctement votre email";
        // }

        // if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
        //     $errors['message'] = "Vous n'avez pas renseigné votre message";
        // }

        // if(!empty($errors)){
            
        //     $_SESSION['errors'] = $errors;
        //     $_SESSION['inputs'] = $_POST;
        //     header('location: index.php?action=contact');
        // }else{
        //     $_SESSION['success'] = 1;

            // data
            // $nom = $_POST['nom'];
            // $email = $_POST['email'];
            // $mess = $_POST['message'];
            // $to = 'stephanie.lemaitre56@gmail.com';
            // $subject = 'Formulaire de contact';
            // $message = "Nom :" .$nom."<br>";
            // "Mail :" .$email."<br>";
            // "Message :" .$mess;
            // ;
            // $headers = 'From: webmaster@example.com' . "\r\n" .
            // 'Reply-To: webmaster@example.com' . "\r\n" .
            // 'X-Mailer: PHP/' . phpversion();
       
            // mail($to, $subject, $message, $headers);
            // // Contenu
            // $from = new \SendGrid\Mail\Mail("Stéphanie Lemaitre","stephanie.lemaitre56@gmail.com");
            // $subject = "Formulaire de contact";
            // $to = new \SendGrid\Mail\Mail("Stéphanie Lemaitre","dev.stephaniel@gmail.com");
            // $content = new \SendGrid\Mail\Content("text\html","
            // Email : {$email}<br>
            // Utilisateur : {$nom}<br>
            // Message : {$message}
            // ");

            // // Envoi du mail
            // $mail = new \SendGrid\Mail\Mail($from,$subject,$to,$content);
            // $apiKey = getenv("SENDGRID_API_KEY");
            // $sg = new \SendGrid($apiKey);

            // $response = $sg->client->mail()->send()->post($mail);
            // echo $response->statusCode();
            // echo $response->headers();
            // // echo $response->body();



            // Instantiation and passing `true` enables exceptions

            // $mail = new PHPMailer(true);

            // try {
            //     //Server settings
            //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            //     $mail->isSMTP();                                            // Send using SMTP
            //     $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
            //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            //     $mail->Username   = 'apikey';                     // SMTP username
            //     $mail->Password   = $_ENV["SENDGRID_API_KEY"];                               // SMTP password
            //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            //     $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //     //Recipients
            //     $mail->setFrom('stephanie.lemaitre56@gmail.com', 'Formulaire de contact');
            //     $mail->addAddress('stephanie.lemaitre56@gmail.com');     // Add a recipient

            //     // Content
            //     $mail->isHTML(true);                                  // Set email format to HTML
            //     $mail->Subject = 'Here is the subject';
            //     $mail->Body = "blablabla";
            //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //     $mail->send();
            //     echo 'Message has been sent';
            // } catch (Exception $e) {
            //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // }
            
            // header('location: index.php?action=contact');

        //     $email = new \SendGrid\Mail\Mail(); 
        //     $email->setFrom("stephanie.lemaitre56@gmail.com", "Example User");
        //     $email->setSubject("Sending with SendGrid is Fun");
        //     $email->addTo("stephanie.lemaitre56@gmail.com", "Example User");
        //     $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        //     $email->addContent(
        //         "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        //     );
        //     $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        //     try {
        //         $response = $sendgrid->send($email);
        //         print $response->statusCode() . "\n";
        //         print_r($response->headers());
        //         print $response->body() . "\n";
        //     } catch (\Exception $e) {
        //         echo 'Caught exception: '. $e->getMessage() ."\n";
        //     }
        // }

        static function createContact(Form $form)
    {
        // Pour créer un commentaire
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();
        
        $request = "INSERT INTO contact (email, nom, message) VALUES ";
        $request .= '( "' . $form->getEmail() . '", "' . $form->getNom() . '", "' . $form->getMessage() .'");';
        
        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        // On insére dans la variable $lastId l'identifiant de la dernière valeur
        $lastId = $db->lastInsertId();

        $form->setId($lastId);
        $db = DbConnexion::closeConnexion();

    }



    // Fonction afficher tous les mails
    public function readAllContact(): array
    {
        // On se connecte à la base de donnée
        $db = DbConnexion::openConnexion();

        // Après avoir tout sélectionné dans la table contact
        // On le stoocke dans un tableau
        $mailsAllList = [];

        // On séléctionne tout dans la table contact
        $request = "SELECT * FROM contact" ;

        // On prépare et exécute la requête
        $stmt = $db->prepare($request);
        $stmt->execute();

        /*
         On crée une boucle tant que ...
         FETCH-ASSOC = mode de récupération de données qui retourne un tableau indéxé par colonne
         Ne permet pas d'appeler plusieurs colonnes du même nom
        */
        while ($mailsFromDb = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            // On instancie un nouvel contact
            $mailAll = new Form($mailsFromDb['email'], $mailsFromDb['nom'], $mailsFromDb['message']);
            $mailAll->setId($mailsFromDb['id']);

            $mailsAllList [] = $mailAll;
        }

        $db = DbConnexion::closeConnexion();

        return $mailsAllList;
    }
    }
// }




