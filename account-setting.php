<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 10px;
      /* padding: 20px; */
    }

    .login-container {
      max-width: 600px;
      margin: 0 auto;
      margin-top: 50px;
      margin-bottom: 100px;

      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      margin-bottom: 20px;
    }
    
    form {
      margin-bottom: 80px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    
    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <?php
    require 'connection.php';
    $email = $_SESSION['email'];
    
    
    // Fetch user data from the database
    $sql = "SELECT * FROM `register` WHERE email='$email';"; // Assuming user ID is 1
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $fullName = $row["name"];
      // $email1 = $row["email"];
      $phone=$row["phone"];
      $address=$row["address"];

    }
    
    
  ?>
  <?php include 'userheader.php'; ?>
  <div class="login-container">
  
  <h1>User Details</h1>
  
  <form method="post">
    <label for="fullName">Full Name:</label>
    <input type="text" id="fullName" name="fullName" value="<?php echo $fullName; ?>" readonly required>
    
    <!-- <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="" readonly> -->

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" readonly required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?php echo $address; ?>" readonly required>
    
    <!-- <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="********"> -->
    
    <button type="button" onclick="editDetails()">Edit Details</button>
    <!-- <button type="button" onclick="changePassword()">Change Password</button> -->
    
    <button type="submit" name="submit" id="saveButton" style="display: none;">Save</button>
  </form>
  </div>
  
  <script>
    function editDetails() {
      document.getElementById("fullName").readOnly = false;
      // document.getElementById("email").readOnly = false;
      document.getElementById("phone").readOnly = false;
      document.getElementById("address").readOnly = false;

      // document.getElementById("password").readOnly = false;
      
       document.getElementById("saveButton").style.display = "block";
    }
    
    // function changePassword() {
    //   var newPassword = prompt("Enter your new password:");
      
    //   if (newPassword) {
    //     document.getElementById("password").value = newPassword;
    //   }
    // }
  </script>
  
  <?php
  if (isset($_POST['submit']))
  {
    // $password=$_POST['password'];
    $name=$_POST['fullName'];
    $add=$_POST['address'];
    $pho=$_POST['phone'];


  
  $sql1 = "UPDATE register SET name='$name',phone='$pho', address='$add' WHERE email = '$email'"; // Assuming user ID is 1
  
  if ($conn->query($sql1) === TRUE) {
    echo "User details updated successfully!";
  } else {
    echo "Error updating user details: " . $conn->error;
  }
}
  ?>
   <?php include 'footer.php'; ?>
</body>
</html>
