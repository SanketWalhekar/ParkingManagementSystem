<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->AuthType = 'LOGIN';
    $mail->Username = '18project03@gmail.com';
    $mail->Password = 'wkrfgzcuvotbaylr';

    // Set the sender and recipient
    $mail->setFrom('18project03@gmail.com', 'Sanket');
    $mail->addAddress('sanketwalhekar83@gmail.com', 'Walhekar');

    // Set email content
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email.';

    // Send the email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
?>
