<?php
require_once 'bdd.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
    $id = (int)$_GET['id_user'];
    var_dump($id);
    $sql = $connexion->prepare('SELECT * FROM user WHERE id= :id');
    $sql->bindValue(':id', $id,PDO::PARAM_INT);
    $sql->execute();
    $resultatEmail = $sql->fetch(PDO::FETCH_ASSOC);

    var_dump($resultatEmail);
    $email = $resultatEmail['email'];
    $nom = $resultatEmail['nom'];
    $token = $resultatEmail['token'];
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
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '<div>ceci est un message pour renitialiser votre mot de passe, veuillez ne pas repondre a ce message <div>';
    $mail->Body    = '<div>Votre Compte vient d\'etre sur le pannel de la police de Malden pour renitialisez votre mot de passe veuillez cliquez sur <strong>le lien : </strong><a href="http://localhost/base/index.php?id=24&id_user='.$id.'&token='.$token.'"> Reset Password </a></div>';
    $mail->AltBody = 'Votre Compte vient d\'être sur le pannel de la police de Malden pour renitialisez votre mot de passe veuillez cliquez sur le lien: '.'http://localhost/base/index.php?id=24&id_user='.$id.'&token='.$token;

    $mail->send();
    echo 'Mail Envoyé';
} catch (Exception $e) {
    echo "Erreur lors de l'envoie du mail: {$mail->ErrorInfo}";
}