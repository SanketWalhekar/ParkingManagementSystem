<?php
session_start();
 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
require 'connection.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

// Retrieve data from session variables
// $name = $_SESSION['name'];
// $email = $_SESSION['email'];
$slot = $_SESSION['slotId'];
$email = $_SESSION['email'];

// Clear session variables after retrieving the data
// unset($_SESSION['name']);
// unset($_SESSION['email']);
// unset($_SESSION['slotId']);


?>
<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - Car Parked Receipt</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      /* padding: 20px; */
      

    }

    .container {
      max-width: 600px;
      margin-top: 10px;
      margin-bottom: 100px;
      
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
    }

    .company-info {
      margin-bottom: 20px;
      text-align: center;
    }

    .receipt-info {
      margin-bottom: 20px;
    }

    .receipt-info p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
<?php include 'userheader.php'; ?>
  <div class="container">
    <div class="company-info">
      <h1>Parking Management System</h1>
      <p>Email: 18project03@gmail.com</p>
      <p>Phone: 123-456-7890</p>
    </div>
    <div class="receipt-info">
    <?php
      // $userSql = "SELECT * FROM register WHERE email = $email";
      // //  $userResult = mysqli_query($conn, $userSql);
      // //  $user = mysqli_fetch_assoc($userResult);
      //  $result = $conn->query($userSql);

      // if ($result->num_rows > 0) 
      // {
      //       $user = $result->fetch_assoc();
           
            
      // }
      $userSql = "SELECT * FROM `register` WHERE email='$email'";
      // //  $userResult = mysqli_query($conn, $userSql);
      // //  $user = mysqli_fetch_assoc($userResult);
       $result = $conn->query($userSql);
    

     if ($result->num_rows > 0) 
      {
            $user = $result->fetch_assoc();
            
            // echo "<p><strong>Name:</strong> " . $user['name'] . "</p>";
           
            
      }
      else{
        echo"No Data Found";
      }
      

      $carSql = "SELECT * FROM vehicle_entries WHERE slot_id = $slot";
      // $carResult = mysqli_query($conn, $carSql);
      // $car = mysqli_fetch_assoc($carResult);
      
      $result1 = $conn->query($carSql);

      if ($result1->num_rows > 0) 
      {
            $car = $result1->fetch_assoc();
            echo "<h3>Car Parked Receipt</h3>";
      echo "<p><strong>Slot Id:</strong> " .  $car['slot_id'] . "</p>";
    //   echo "<p><strong>Name:</strong> " . $user['name'] . "</p>";
    //   echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
    //   echo "<p><strong>Phone:</strong> " . $user['phone'] . "</p>";
    //   echo "<p><strong>Address:</strong> " . $user['address'] . "</p>";
      echo "<p><strong>Vehicle Type:</strong> " . $car['vehicle_type'] . "</p>";
      echo "<p><strong>License Plate:</strong> " . $car['Number_Plate'] . "</p>";
      echo "<p><strong>Parked Time:</strong> " . $car['Date_time'] . "</p>";
           
      }
      else
      {
        echo "No Data Found";
      }

      //  Display receipt information
      
    
    

      $username=$user['name'];
      $useremail=$user['email'];
      $userphone=$user['phone'];
      $useraddress=$user['address'];
      $cartype=$car['vehicle_type'];
      $carnumber=$car['Number_Plate'];
      $date=$car['Date_time'];
    ?>


    </div>
    


  </div>
  <?php include 'footer.php'; ?>

  <!-- Include Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

