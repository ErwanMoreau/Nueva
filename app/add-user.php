<?php
require_once 'bdd.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



if(isset($_POST) && !empty($_POST)){

    $options = [ 
        'cost' => 12, 
    ]; 
    $email = $_POST['email'];
    // verify if the email is not already in database
    $emailSql = $connexion->prepare('SELECT * FROM user WHERE email= :email');
    $emailSql->bindValue(':email', $email, PDO::PARAM_STR);
    $emailSql->execute();
    $resultat = $emailSql->fetchAll();

    if(empty($resultat)){
        // generate unique Token for security control
        function token($length = 60){
            $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                      '0123456789';
          
            $str = '';
            $max = strlen($chars) - 1;
          
            for ($i=0; $i < $length; $i++)
              $str .= $chars[mt_rand(0, $max)];
          
            return $str;
          }

        // stock the data in variable
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options) ;
        $matricule = $_POST['matricule'];
        $grade = $_POST['id_grade'];
        $token = token();

        // prepare the request
        $sql = $connexion->prepare('INSERT INTO user(nom, prenom, email, password, matricule,  id_grade, token) VALUES(:nom, :prenom, :email, :password, :matricule,  :id_grade, :token) ');

        // insert Value into Request 
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':password', $password, PDO::PARAM_STR);
        $sql->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $sql->bindValue(':token', $token, PDO::PARAM_STR);
        $sql->bindValue(':id_grade', $grade, PDO::PARAM_INT);

        // launch the request 
        $sql->execute();


        $ResetSql = $connexion->prepare('SELECT * FROM user WHERE email= :email');
        $ResetSql->bindValue(':email', $email, PDO::PARAM_STR);
        $ResetSql->execute();
        $resultatBis = $ResetSql->fetch(PDO::FETCH_ASSOC);

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '77f3cc77bbbd6b';                     // SMTP username
    $mail->Password   = '60dc71225970d0';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 2525;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@agorapolis.fr', 'Joe bacon');
    $mail->addAddress($email, $nom );     // Add a recipient
  


    // Attachments


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '<div>ceci est un message pour renitialiser votre mot de passe, veuillez ne pas repondre a ce message <div>';
    $mail->Body    = '<div>Votre Compte vient d\'etre sur le pannel de la police de Malden pour renitialisez votre mot de passe veuillez cliquez sur <strong>le lien : </strong><a href="http://localhost/base/index.php?id=2&id_user='.$resultatBis['id'].'&token='.$token.'"> Reset Password </a></div>';
    $mail->AltBody = 'Votre Compte vient d\'être sur le pannel de la police de Malden pour renitialisez votre mot de passe veuillez cliquez sur le lien';
   
    $mail->send();
    echo 'Mail Envoyé';
} catch (Exception $e) {
    echo "Erreur lors de l'envoie du mail: {$mail->ErrorInfo}";
}


         header('Location: index.php?id=5');
        
    } else {
         header('Location: index.php?id=5');
    }

}

?>