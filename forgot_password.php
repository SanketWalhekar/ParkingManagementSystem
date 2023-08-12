<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'connection.php';

function generateOTP() {
    return rand(100000, 999999);
}

function sendOTP($email2, $otp1) {
    // Implement your code to send the OTP via email or SMS here
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
        $mail->Password = 'jhwiwlwpdahdofnc';

        // Set the sender and recipient
        $mail->setFrom('18project03@gmail.com', 'Parking Management System');
        $mail->addAddress($email2, 'Dear User');

        // Set email content
        $mail->Subject = 'Your Otp for Parking Management System ';
        $mail->Body = $otp1;

        // Send the email
        $mail->send();
        header("location:forgot-verify.php");
        echo 'OTP sent successfully';
    } catch (Exception $e) {
        // echo 'OTP could not be sent. Error: ', $mail->ErrorInfo;
        echo '<div class="error-message">Something went wrong, OTP could not be sent. Please try again!</div>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

    
    .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      margin-top: 100px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Forgot Password</h2>
    <form method="POST">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email2" name="email2" placeholder="Enter your email">
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
  </div>
  

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
  

  if (isset($_POST['submit'])) {
      $email2 = $_POST['email2'];
      $_SESSION['email2'] = $_POST['email2'];
      $otp1 = generateOTP();
      sendOTP($email2, $otp1);
      $_SESSION['otp1'] = $otp1;
      // header("location:forgot-verify.php");
      exit; // Add this line to stop script execution after the header redirect
  }
  ?>
  <?php include 'header.php';?>

<?php include 'footer.php';?>
</body>
</html>
