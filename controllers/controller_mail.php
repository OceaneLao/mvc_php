<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './services/PHPMailer-master/src/Exception.php';
require_once './services/PHPMailer-master/src/PHPMailer.php';
require_once './services/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = 'dccaf11b3b7d34';
$mail->Password = 'ad1548e6db64f1';

 //Recipients
 $mail->setFrom('from@example.com', 'Mailer');
 $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
 $mail->addAddress('ellen@example.com');               //Name is optional
 $mail->addReplyTo('info@example.com', 'Information');
 $mail->addCC('cc@example.com');
 $mail->addBCC('bcc@example.com');

 //Attachments
//  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

 $mail->send();
 echo 'Message has been sent';
} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

include "./views/layout.phtml";