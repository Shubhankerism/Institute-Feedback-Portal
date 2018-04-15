<?php

// ini_set('SMTP','tls://smtp.gmail.com');
// ini_set('smtp_port',"587");

// $to="shubhanker621@gmail.com";
// $body="Your OTP is:".rand(10000,99999).".";
// $header="From: shubhanker621@gmail.com";
// $subject="OTP Trial";

// if(mail($to,$subject,$body,$header)){
// 	echo "Mail sent!";
// }
// else{
// 	echo "Not sent!";
// }

?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//stream_context_set_default(['http'=>['proxy'=>'192.168.1.107:3128']]);
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer\phpmailer\src\PHPMailer.php';
require 'phpmailer\phpmailer\src\Exception.php';
require 'phpmailer\phpmailer\src\SMTP.php';

//Load Composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'shubhanker621@gmail.com';                 // SMTP username
    $mail->Password = '@9415428621@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('shubhanker621@gmail.com', 'Shubhanker');
    $mail->addAddress('shubhanker621@gmail.com', 'Shubhanker');     // Add a recipient
/*    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'OTP';
    $mail->Body    = "Your OTP is:".rand(10000,99999).".";;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}