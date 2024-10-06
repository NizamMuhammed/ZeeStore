<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
require './vendor/autoload.php';

// send email
function sendMail(String $sender, String $name, String $subject, String $body)
{
  $mail = new PHPMailer(true);
  set_time_limit(300);

  try {
    //Server settings
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
    $mail->Username = 'eyenebula45@gmail.com';           // SMTP username
    $mail->Password = 'xmupqjbxduldfvuc';              // SMTP password (use an app password if 2FA is enabled)
    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('eyenebula45@gmail.com', 'ZeeStore');
    $mail->addAddress($sender, $name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
