<?php
session_start();
require 'connection.php';
$email = $_SESSION['email'];
$userSql = "SELECT * FROM `register` WHERE email='$email'";
$result = $conn->query($userSql);

if ($result->num_rows > 0) 
 {
  $user = $result->fetch_assoc();
  // echo "<p><strong>Name:</strong> " . $user['name'] . "</p>";
  $name=$user['name'];
  // echo $name;
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - User Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles can be added here */
    html,
    body {
      height: 100%;
    }

    #wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    #content {
      flex: 1;
    }

    .navbar {
      height: 70px; /* Increase the height to your desired value */
    }

    .navbar-brand {
      line-height: 70px; /* Vertically center the text within the header */
    }

    .navbar-dark .navbar-nav .nav-link {
      line-height: 70px; /* Vertically center the text within the header */
    }
  </style>
</head>
<body>
  <div id="wrapper">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Parking Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/userdashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/parkingslot.php">Parking Slots</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/show.php">Vehicle History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/current_parked.php">Current Parked</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/account-setting.php">Account Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/home.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="content" class="container mt-5">
     <h1>Welcome <?php echo $name ?></h1> 
    
    <p>Welcome to our Parking Management System. We are dedicated to providing efficient and convenient parking solutions to our customers. With our state-of-the-art technology and user-friendly interfaces, we aim to streamline the parking process and enhance the overall experience for both parking operators and users.</p>
    <p>Our system offers a range of features, including:</p>
    <ul>
      <li>Real-time parking availability updates</li>
      <li>Online booking and reservation system</li>
      <li>Secure payment options</li>
      <li>Easy access and navigation within parking facilities</li>
      <li>Integration with mobile applications for seamless parking management</li>
      <li>Reporting and analytics tools for parking operators</li>
    </ul>
    <p>At Parking Management System, we prioritize customer satisfaction and strive to meet the diverse needs of parking facilities, from small lots to large-scale parking structures. Our dedicated team of professionals is committed to delivering exceptional service and continuous innovation to meet the ever-evolving demands of the parking industry.</p>
     
    </div>

    
    
  </div>

  <?php include 'footer.php'; ?>

  <!-- Include Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


