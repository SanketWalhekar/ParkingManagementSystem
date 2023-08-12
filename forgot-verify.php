<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - OTP Verification</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 400px;
      margin: 50px auto;
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
  </style>
</head>
<body>
<?php include 'header.php'; ?>
  <div class="container">
    <h2>OTP Verification</h2>
    <form  method="POST">
      <div class="form-group">
        <label for="otp">Enter OTP:</label>
        <input type="text" class="form-control" id="otp" name="otp" required>
      </div>
      <button type="submit" class="btn btn-primary" name="verify">Verify</button>
    </form>
  </div>
  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php

if (isset($_POST['verify'])) {
    // Retrieve the entered OTP and email
    $enteredOTP = $_POST['otp'];
    // $name = $_SESSION['name'];
    //  $email2 = $_POST['email2'];
    // $phone = $_SESSION['phone'];
    // $address = $_SESSION['address'];
    // $password = $_SESSION['password'];
    $otp1=$_SESSION['otp1'];
    if ($enteredOTP == $otp1)
    {
        header("location:forgot-change.php");
    }
    else{
      echo '<div class="error-message">Invalid OTP !!! Please Enter Valid OTP...</div>';
        
    }
   }
?>