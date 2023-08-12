<?php
session_start();
require 'connection.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data and store it in session variables
  // $_SESSION['name'] = $_POST['name'];
  //  $_SESSION['email'] = $_POST['email'];
  $_SESSION['slotId']=$_POST['slotId'];
  //$_SESSION['email']=$_POST['email'];
  $slotId = $_POST['slotId'];
  // $email = $_POST['email'];
  // $address = $_POST['address'];
  $vehicleType = $_POST['vehicleType'];
  $numberPlate = $_POST['numberPlate'];
  $email = $_SESSION['email'];
  
  $sql2="SELECT * FROM `parkingslot` WHERE slotid=$slotId;";
  $result = $conn->query($sql2);

  if ($result->num_rows > 0) 
  {
            $row = $result->fetch_assoc();
            $data =$row['status'];
            
  }

  if($data=="Available")
  {
    $sql = "INSERT INTO vehicle_entries (slot_id, vehicle_type, number_plate,email) VALUES ('$slotId','$vehicleType', '$numberPlate','$email')";
    if (mysqli_query($conn, $sql)) 
    {
      echo "Slot Booked Successfully";
      $sql1="UPDATE `parkingslot` SET `status`='Reserved' WHERE slotid=$slotId;";
      mysqli_query($conn, $sql1);
      header("location:destination.php");
      exit();
    } 
    else
    {
      echo"Slot Already booked Or Any Other Problem";

    }


  }
  else
  {
    echo "Already Reserved";
  }

  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - Vehicle Entry</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group select {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group .error-message {
      color: red;
      margin-top: 5px;
    }

    .form-group .success-message {
      color: green;
      margin-top: 5px;
    }

    .form-group .submit-button {
      width: auto;
      padding: 8px 20px;
      border-radius: 3px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<?php include 'userheader.php'; ?>
  <div class="container">
    <h1>Vehicle Entry</h1>
    <form id="entryForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <label for="slotId">Slot ID:</label>
        <input type="text" id="slotId" name="slotId" required>
      </div>
      <!-- <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
      </div> -->
      <div class="form-group">
        <label for="vehicleType">Vehicle Type:</label>
        <select id="vehicleType" name="vehicleType" required>
          <option value="">Select Vehicle Type</option>
          <option value="Car">Car</option>
          <option value="Motorcycle">Motorcycle</option>
          <option value="Truck">Truck</option>
        </select>
      </div>
      <div class="form-group">
        <label for="numberPlate">Number Plate:</label>
        <input type="text" id="numberPlate" name="numberPlate" required>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Submit"  class="submit-button">
      </div>
    </form>
  </div>

  <!-- Include JavaScript for form validation -->
  <script>
    document.getElementById("entryForm").addEventListener("submit", function(event) {
      var slotId = document.getElementById("slotId").value;
      var email = document.getElementById("email").value;
      var address = document.getElementById("address").value;
      var vehicleType = document.getElementById("vehicleType").value;
      var numberPlate = document.getElementById("numberPlate").value;

      // Perform form validation
      var isValid = true;

      // Validate Slot ID
      if (slotId.trim() === "") {
        isValid = false;
        document.getElementById("slotId").classList.add("error");
      } else {
        document.getElementById("slotId").classList.remove("error");
      }

      // Validate Email
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email.match(emailRegex)) {
        isValid = false;
        document.getElementById("email").classList.add("error");
      } else {
        document.getElementById("email").classList.remove("error");
      }

      // Validate Address
      if (address.trim() === "") {
        isValid = false;
        document.getElementById("address").classList.add("error");
      } else {
        document.getElementById("address").classList.remove("error");
      }

      // Validate Vehicle Type
      if (vehicleType === "") {
        isValid = false;
        document.getElementById("vehicleType").classList.add("error");
      } else {
        document.getElementById("vehicleType").classList.remove("error");
      }

      // Validate Number Plate
      if (numberPlate.trim() === "") {
        isValid = false;
        document.getElementById("numberPlate").classList.add("error");
      } else {
        document.getElementById("numberPlate").classList.remove("error");
      }

      // Prevent form submission if any validation error occurs
      if (!isValid) {
        event.preventDefault();
      }
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>