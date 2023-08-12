<?php
session_start();
require 'connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email']=$_POST['email'];

    // Validate form data
    $errors = array();
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are no errors, proceed with login
    if (empty($errors)) {
        // Replace this with your actual database connection code
        

        // Retrieve user record from the database based on the provided email
        $sql = "SELECT * FROM register WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            

            // Verify the password
            if ($password==$row['password']) {
                // Password is correct
                header("Location: userdashboard.php");
                // Redirect to the dashboard or perform further actions
                echo "<h2>Login Successful!</h2>";
                echo "<p>Welcome, " . $row['name'] . "!</p>";
            } else {
                // Password is incorrect
                echo '<div class="error-message"><h4> Login  Failed</h4>';
                echo '<p>Invalid Username or Password..</p> </div>';
            }
        } else {
            // User with the provided email does not exist
            echo '<div class="error-message"><h4> Login  Failed</h4>';
            echo '<p>Invalid Username or Password..</p> </div>';
        }

        
    } else {
        // Display the validation errors
        echo "<h2>Login Failed:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 70px;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-primary {
      width: 100%;
    }

    .text-center {
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
    <div class="login-container">
      <h2>User Login</h2>
      <form id="login-form" method="POST">
        <div class="form-group">
          <label for="username">Email</label>
          <input type="text" class="form-control" id="username" name="email" placeholder="Enter your Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password"placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
      </form>
      <p class="text-center">Don't have an account? <a href="http://localhost/park1/registration.php">Sign up</a></p>
      <p class="text-center"><a href="http://localhost/park1/forgot_password.php">Forgot Password</a></p>
    </div>
  </div>
  <?php include 'footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>

</html>


