<?php
$var=25;
require 'PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bansalanshul121993@gmail.com';                   // SMTP username
$mail->Password = 'bansal887@kanina';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('bansalanshul121993@gmail.com', 'Amit Agarwal');     //Set who the message is to be sent from
$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
$mail->addAddress('meghalgupta23@gmail.com', 'Josh Adams');  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters        // Add attachments // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body "'.$var.'" <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(folder));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent';