<?php
//Import the PHPMailer class into the global namespace
//PHPMailer dependecies

$statusMessage = "";
$parentname = "";
$contactemail = "";
$contactnumber = "";
$subject = "";

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try{
    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    if(isset($_POST["submit"])){
    
    //set correct encoding and language
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->setLanguage('cs', 'PHPMailer-master/language/');
    
    date_default_timezone_set('Europe/Prague');
    $dateTime = date('d.m.Y H:i:s', time());

    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $datenumber = $_POST["coursedate"];
    $parentname = $_POST["parentname"];
    $contactemail = $_POST["email"];
    $contactnumber = $_POST["tel"];
    
    //recaptcha v2
    $secretKey = "6LesY4oaAAAAANZaZoxbV_MP74qp8Mz0OAwG3dxh";
    $responseKey = $_POST["g-recaptcha-response"];
    $UserIP = $_SERVER["REMOTE_ADDR"];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

    $response = file_get_contents($url);
    $response = json_decode($response);
    
    if($response->success){
        
    $subject = "Nová registrace od " . $parentname;
    
    //encode subject
    $preferences = ['input-charset' => 'UTF-8', 'output-charset' => 'UTF-8'];
    $encoded_subject = iconv_mime_encode('Subject', $subject, $preferences);
    $encoded_subject = substr($encoded_subject, strlen('Subject: '));
    
    if ($datenumber = 1){
        $date = "12. - 16. 7. 2021";
    } else{
        $date = "19. - 23. 7. 2021";
    }

    $message = '<html><body style="font-size: 16px;">';
    $message .= '<img style="max-width:120px" src="https://meetandplay.cz/img/texturedlogo.png" alt="meetandplay logo" />';
    $message .= '<h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 24px;">Nová registrace Meet and Play</h1>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #f2f2f2;'><td><strong>Jméno účastníka:</strong> </td><td>" . $name . "</td></tr>";
    $message .= "<tr><td><strong>Datum narození účastníka:</strong> </td><td>" . $birthdate . "</td></tr>";
    $message .= "<tr style='background: #f2f2f2;'><td><strong>Vybraný termín:</strong> </td><td>" . $date . "</td></tr>";
    $message .= "<tr><td><strong>Jméno zákonného zástupce:</strong> </td><td>" . $parentname . "</td></tr>";
    $message .= "<tr style='background: #f2f2f2;'><td><strong>Kontaktní e-mail:</strong> </td><td>" . $contactemail . "</td></tr>";
    $message .= "<tr><td><strong>Kontaktní telefon:</strong> </td><td>" . $contactnumber . "</td></tr>";
    $message .= "</table>";
    $message .= "<p>Tato zpráva byla vygenerována pomocí systému PHPMailer</p>";
    $message .= "</body></html>";
    
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->Host = 'mail.hukot.net';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "form@meetandplay.cz";
    $mail->Password = "xxxxx";
    $mail->SMTPSecure = 'tls';
    
    //Set PHPMailer to use the sendmail transport
    //$mail->isSendmail();
    //Set who the message is to be sent from
    $mail->setFrom($contactemail, $parentname);
    //Set an alternative reply-to address
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    //Set who the message is to be sent to
    $mail->addAddress('kontakt@meetandplay.cz');
    //Set the subject line
    $mail->Subject = $encoded_subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($message);
    //Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');
    
    //send the message, check for errors
    if (! $mail->Send()) {
        //mailer error
        $statusMessage = "<div class='form-group row mb-3'><div class='col-md-12' id='statusMessage'><div class='alert alert-danger'><span class='mr-1'><i class='fas fa-times-circle'></i></span>Chyba Maileru: Přihlášku se nepodařilo odeslat. Zkuste to prosím znovu, nebo nás kontaktujte. Error: " . $mail->ErrorInfo . "</div></div></div>";
        
    } else {
        //success message
        $statusMessage = "<div class='form-group row mb-3'><div class='col-md-12' id='statusMessage'><div class='alert alert-success'><span class='mr-1'><i class='fas fa-check'></i></span>Registrace byla úspěšná, brzy budete kontaktováni. </div></div></div>";
    }
    }
    }
//catch and output exceptions
} catch (Exception $e) {
    $e->errorMessage();
    $statusMessage = "<div class='form-group row mb-3'><div class='col-md-12' id='statusMessage'><div class='alert alert-danger'><span class='mr-1'><i class='fas fa-times-circle'></i></span>Error: Přihlášku se nepodařilo odeslat. Podrobnosti: " . $e . "</div></div></div>";

} catch (\Exception $e) {
    $e->getMessage();
    $statusMessage = "<div class='form-group row mb-3'><div class='col-md-12' id='statusMessage'><div class='alert alert-danger'><span class='mr-1'><i class='fas fa-times-circle'></i></span>Error: Přihlášku se nepodařilo odeslat. Podrobnosti: " . $e . "</div></div></div>";
}