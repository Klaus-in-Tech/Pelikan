<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.pelikancapitaltradingclearingealimited.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'info@pelikancapitaltradingclearingealimited.com';                  
    $mail->Password   = 'Pelikan*0754';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;     
                                  
    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('info@pelikancapitaltradingclearingealimited.com');   

    $mail->Subject = $subject;
    $mail->Body =  $message;



    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}