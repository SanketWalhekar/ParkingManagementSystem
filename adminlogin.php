<?php
require 'connection.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    $errors = array();
    
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are no errors, proceed with login
    if (empty($errors)) {
        // Replace this with your actual database connection code
        

        // Retrieve user record from the database based on the provided email
        $sql = "SELECT * FROM adminlogin WHERE username = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            

            // Verify the password
            if ($password==$row['password']) {
                // Password is correct
                header("Location:admindash.php");
                // Redirect to the dashboard or perform further actions
                echo "<h2>Login Successful!</h2>";
                echo "<p>Welcome, " . $row['name'] . "!</p>";
            } else {
                // Password is incorrect
                echo "<h2>Login Failed:</h2>";
                echo "<p>Incorrect email or password.</p>";
            }
        } else {
            // User with the provided email does not exist
            echo "<h2>Login Failed:</h2>";
            echo "<p>Incorrect email or password.</p>";
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
<!-- <?php
// require 'connection.php';

// $sql = "SELECT * FROM adminlogin";
// $result = $conn->query($sql);

// // Check if any rows were returned
// if ($result->num_rows > 0) {
//   // $column1 = array();
//   // $column2 = array();
//     // Loop through each row
//     while ($row = $result->fetch_assoc()) {
//         // Access individual columns using column names
//         $column1= $row["username"];
//         $column2= $row["password"];
//         // Process the data
//         // ...
//     }
// } else {
//     echo "No results found.";
// }



// // echo $column1; 
// // echo $column2;
// // Close the connection
// if (isset($_POST['login'])) {
//   $username = $_POST["username"];
//   $password = $_POST["password"];
//   if($username==$column1 && $password==$column2)
//   {
//   header("Location: show.php");
//   exit();
//   }
//   else{
    
//      echo "something went wrong";
//   }
// }
?> -->

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
  </style>
</head>
<?php include 'header.php'; ?>

<body>
  <div class="container">
    <div class="login-container">
      <h2>Admin Login</h2>
      <form id="login-form" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="email" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password"placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
      </form>
      
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <script>
    $(document).ready(function () {
      $('#login-form').submit(function (event) {
        event.preventDefault(); // Prevent form submission

        // Perform login validation or other operations here
        // You can use JavaScript or make an AJAX request to a server-side script
        // to handle the login functionality
      });
    });
  </script> -->
</body>
<?php include 'footer.php'; ?>
</html>
