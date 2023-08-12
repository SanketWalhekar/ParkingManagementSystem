<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parking Entry List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      /* padding-top: 50px; */
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom:80px;
      margin-top:30px;
    }

    h2 {
      margin-bottom: 20px;
    }

    .entry-card {
      margin-bottom: 20px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .delete-button {
      float: right;
      color: #dc3545;
      font-size: 1.2rem;
      cursor: pointer;
    }
  </style>
</head>

<body>
<?php include 'userheader.php'; ?>
  <div class="container">
    <h2>Parking Entry List</h2>
    <div id="entry-list">
      <?php
        // require 'connection.php';

        // Retrieve data from the database
        // require 'connection.php';
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM `final`where email='$email'";

        $result = $conn->query($sql);
        // if($result)
        // {
        //   echo "Yes";

        // }
        // else{
        //   echo "No";
        // }

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
                    $entryDateTime=$row["entry_date"];
                    $exitDateTime=$row["Exit Date"];
                    $entryTimestamp = strtotime($entryDateTime);
                    $exitTimestamp = strtotime($exitDateTime);
                    
                    $duration = abs($exitTimestamp - $entryTimestamp);
                    
                    $totalMinutes = floor($duration / 60);
                    $totalHours = floor($totalMinutes / 60);
                    // $remainingMinutes = $totalMinutes % 60;
                    $days = floor($totalHours / 24);
                    $remainingHours = $totalHours % 24;
                    $remainingMinutes = $totalMinutes % 60;
                    $payment=$totalMinutes*0.1;
                    // echo "Total time: " . $days . " days, " . $remainingHours . " hours, and " . $remainingMinutes . " minutes";

            echo '<div class="entry-card">';
            // echo '<span class="delete-button" data-id="' . $row["slot_id"] . '">&times;</span>';
            // echo '<p><strong>Name:</strong> ' . $row["Name"] . '<br>';
            // echo '<strong>Address:</strong> ' . $row["Address"] . '<br>';
            echo '<strong>Slot ID:</strong> ' . $row["slotid"] . '<br>';
            echo '<strong>Name:</strong> ' . $row["name"] . '<br>';
            // echo '<strong>Vehicle Name:</strong> ' . $row["Vehicle_Name"] . '<br>';
            echo '<strong>Address:</strong> ' . $row["address"] . '<br>';
            // echo '<strong>Entry Date:</strong> ' . $row["Entry_Date"] . '<br>';
            echo '<strong>Phone :</strong> ' . $row["phone"] . '<br>';
            echo '<strong>Email :</strong> ' . $row["email"] . '<br>';
            echo '<strong>Vehicle Type :</strong> ' . $row["vehicle_type"] . '<br>';
            echo '<strong>Car Number :</strong> ' . $row["car_number"] . '<br>';
            echo '<strong>Entry Date-Time :</strong> ' . $row["entry_date"] . '<br>';
            echo '<strong>Exit Date-Time :</strong> ' . $row["Exit Date"] . '<br>';
            echo "<Strong>Total time: </strong>" . $days . " days, " . $remainingHours . " hours, and " . $remainingMinutes . " minutes<br>";
            echo '<strong>Payment :</strong> ' . $payment. ' Rs.<br>';


            // echo '<strong>Email:</strong> ' . $row["email"] . '</p>';
            ?>
            
          <?php


 
            echo '</div>';
          }
        } else {
          echo '<p>No entries found.</p>';
        }
        // $email=$row["email"];
        // echo $email;
        // $sql1 = "SELECT * FROM `register` where email='$email'";
        // $result1 = $conn->query($sql1);
        // if ($result1->num_rows > 0) {
        //   while ($row1 = $result1->fetch_assoc()) {
        //     echo '<p><strong>Name:</strong> ' . $row1["name"] . '<br>';
        //     echo '<strong>Address:</strong> ' . $row1["address"] . '<br>';
        //     echo '<strong>Address:</strong> ' . $row1["phone"] . '<br>';
        //     echo '</div>';





      
        

        

        
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
  $(".delete-button").click(function () {
    var entryId = $(this).data("id");

    // Perform AJAX request to delete the entry
    $.ajax({
      url: "delete_entry.php",
      type: "POST",
      data: { id: entryId },
      success: function (response) {
        if (response === "success") {
          // Remove the entry from the DOM
          $(this).closest(".entry-card").remove();
        } else {
          alert("Failed to delete the entry.");
        }
      },
      error: function () {
        alert("An error occurred while deleting the entry.");
      }
    });
  });
});
</script>
</body>
<?php include 'footer.php'; ?>

</html>
<?php


//Get the entry ID from the AJAX request
// $entryId = $_POST["id"];

// Delete the entry from the database
// $sql = "DELETE FROM parking_entries WHERE id = $entryId";

// if ($conn->query($sql) === TRUE) {
//   echo "success";
// } else {
//   echo "error";
// }

// $conn->close();
// ?>