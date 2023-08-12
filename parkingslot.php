<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - Slots</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Additional custom styles can be added here */
    .container {
      margin-top: 25px;
      margin-bottom:90px;
    }
  </style>
</head>
<body>
  
<?php include 'userheader.php'; ?>

  <div class="container">
    <h1>Parking Slots</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Slot ID</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
    <?php
        require 'connection.php';
        
         $sql = "SELECT slotid, status FROM parkingslot";
         $result = mysqli_query($conn, $sql);
        
        // Displaying data in the table
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['slotid'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No slots found.</td></tr>";
        }
        
        
        
        ?>
      </tbody>
    </table>
    <button onclick="goToPage2()">Reserve Your Parking Slot Now...</button>

  <script>
    function goToPage2() {
      window.location.href = "example.php";
    }
  </script>
  </div>
  <?php include 'footer.php'; ?>
  <!-- Include Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



