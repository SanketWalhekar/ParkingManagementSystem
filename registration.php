<?php
session_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'connection.php';
// Generate a random 6-digit OTP
function generateOTP() {
    return rand(100000, 999999);
}

// Send the OTP via email or SMS
function sendOTP($email, $otp) {
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
      $mail->addAddress($email, 'Dear User');

    // Set email content
      $mail->Subject = 'Your Otp for Parking Management System ';
      $mail->Body = $otp;

    // Send the email
      $mail->send();
      echo 'OTP sent successfully';
  } catch (Exception $e) {
    echo 'OTP could not be sent. Error: ', $mail->ErrorInfo;
  }
      // For demonstration purposes, we'll just display it
    // echo "Your OTP: " . $otp;
  }


// Handle form submission
 if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email1'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    // $confirm_password = $_POST['confirm_password'];
    // $_SESSION['email1']=$_POST['email1'];
    // $_SESSION['name']=$_POST['name'];

    // Validate form data
    // $errors = array();
    // if (empty($name)) {
    //     $errors[] = "Name is required.";
    // }
    // if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors[] = "Valid email is required.";
    // }
    // if (empty($phone)) {
    //     $errors[] = "Phone number is required.";
    // }
    // if (empty($password)) {
    //     $errors[] = "Password is required.";
    // }
    // if ($password !== $confirm_password) {
    //     $errors[] = "Passwords do not match.";
    // }
     $checkEmailQuery = "SELECT * FROM register WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);
        
    if ($result->num_rows > 0) {
            // User with the same email already exists
            
            echo '<div class="error-message"><h4>Registration Failed:</h4>';
            echo '<p>A user with the same email address already exists. Please try with another email address.</p></div>';
    }
            
    // If there are no errors, proceed to send OTP
    else {

      if($password==$confirm_password)
      {
        
        $otp = generateOTP();
        sendOTP($email, $otp);
        // echo "<input type='hidden' name='myVariable' value='$otp'>";
        $_SESSION['email1']=$_POST['email1'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['otp'] = $otp;
        

        // $sql = "INSERT INTO `register` (`name`, `email`, `phone`, `address`, `password`, `otp`) VALUES ('$name', '$email', '$phone', '$address', '$password', '$otp');";
        
        // $result = $conn->query($sql);
        // if($result)
        //  {
        //    echo "Data Inserted Successfully";
        //  }
        // else
        //  {  
        //    echo "User Already Exits";
        //  }
        // Here, we'll just display the submitted data for demonstration purposes
        // echo "<h2>Registration Successful!</h2>";
        // echo "<p>Name: $name</p>";
        // echo "<p>Email: $email</p>";
        // echo "<p>Phone: $phone</p>";

        // You can redirect the user to a verification page
          header("Location: verify.php");
     }
     else{
      echo'<p class="error-message">Password Does not match</p>';
     }
     
    }
    //  else {
    //     // Display the validation errors
    //     echo "<h2>Registration Failed:</h2>";
    //     echo "<ul>";
    //     // foreach ($errors as $error) {
    //     //     echo "<li>$error</li>";
    //     // }
    //     echo "</ul>";
    // }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 400px;
      margin: 80px auto; 
      margin-top: 60px;
      margin-bottom: 80px;
    }
    .error {
      color: red;
    }
    .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 40px;
        }

    
    .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 40px;
    }
    .login-container {
      max-width: 600px;
      margin: 0 auto;
      margin-top: 40px;
      margin-bottom:90px;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'footer.php';?>
  <div class="login-container">
    <center><h2>Registration</h2></center>
    <form method="POST" >
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
      </div>
      <!-- <input type='hidden' name='myVariable' value='$otp'> -->
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email1" name="email1" required value="<?php echo isset($_POST['email1']) ? htmlspecialchars($_POST['email1']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="phone">Address</label>
        <input type="text" class="form-control" id="address" name="address" required value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required value="<?php echo isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Register</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

