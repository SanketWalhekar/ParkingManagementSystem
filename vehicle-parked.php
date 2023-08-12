<?php
require 'connection.php';

// // Retrieve parking entries from the database
// $stmt = $conn->query("SELECT * FROM vehicle_entries");
// $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
$userSql = "SELECT * FROM vehicle_entries";
$userResult = mysqli_query($conn, $userSql);
$entries = array();
while ($row = mysqli_fetch_assoc($userResult)) {
    $entries[] = $row;
}

// Handle deletion of a single entry
if (isset($_GET['delete'])) {
      $entryId = $_GET['delete'];
      // $stmt = $conn->prepare("DELETE FROM vehicle_entries WHERE slot_id = :entryId");
      // $stmt->bindParam(':entryId', $entryId);
      // $stmt->execute();
    //   echo $entryId; 
      $sql2="SELECT * from vehicle_entries WHERE slot_id =$entryId";
      $result=mysqli_query($conn, $sql2);
      $row1 = mysqli_fetch_assoc($result);
      $id=$row1['slot_id'];
      $vehicletype=$row1['vehicle_type'];
      $carnumber=$row1['Number_Plate'];
      $Date=$row1['Date_time'];
      $email=$row1['email'];
    //   echo $id;
    //   echo $vehicletype;
    //   echo $carnumber;
    //   echo $Date;

    $sql4 = "SELECT * FROM register WHERE email='$email'";
    $result4 = mysqli_query($conn, $sql4);
    
    if ($result4) {
        $row2 = mysqli_fetch_assoc($result4);
        $name = $row2['name'];
        $address = $row2['address'];
        $phone = $row2['phone'];
    
        // Rest of your code
     } else {
        echo "Error: " . mysqli_error($conn);
    }
    

    //   echo $name;
    //   echo $address;
    //   echo $phone;
       $sql3 = "INSERT INTO `final` (`slotid`, `name`, `address`, `phone`, `email`, `vehicle_type`, `car_number`, `entry_date`) VALUES ('$id', '$name', '$address', '$phone', '$email', '$vehicletype', '$carnumber', '$Date');";
       $result3 = mysqli_query($conn, $sql3);

    //   if ($result3) {
    //     echo "Data inserted successfully";
    //   } else {
    //    echo "Error: " . mysqli_error($conn);
    //   }


      $Sql = "DELETE FROM vehicle_entries WHERE slot_id =$entryId";
      $userResult1 = mysqli_query($conn, $Sql);
      $sql1="UPDATE `parkingslot` SET `status`='Available' WHERE slotid=$entryId;";
      mysqli_query($conn, $sql1);
      echo "Data Removed Successfully";

    //   $sql2="SELECT * from vehicle_entries WHERE slot_id =$entryId";
    //   $result=mysqli_query($conn, $sql);
    //   $row1 = mysqli_fetch_assoc($result)
    //   $id=$row1['slot_id'];
    //   $vehicletype=$row1['vehicle_type'];
    //   $carnumber=$row1['Number_Plate'];
    //   $Date=$row1['Date_time'];
    //   $email=$row1['email'];
    //   echo $id;
  
      // Redirect back to the page after deletion
      header("Location: vehicle-parked.php");
      exit();
  }
  
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Parking Management System</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        h1
        {
            text-align:center;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include 'adminheader.php'; ?>
    
    <h1>Parking Management System</h1>
    <table>
        <thead>
            <tr>
                <th>SLOT ID</th>
                <th>Vehicle Type</th>
                <th>Vehicle Number</th>
                <th>Entry Time</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry): ?>
            <tr>
                <td><?php echo $entry['slot_id']; ?></td>
                <td><?php echo $entry['vehicle_type']; ?></td>
                <td><?php echo $entry['Number_Plate']; ?></td>
                <td><?php echo $entry['Date_time']; ?></td>
                <td><?php echo $entry['email']; ?></td>


                <td>
                    <form method="post" action="vehicle-parked.php?delete=<?php echo $entry['slot_id']; ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
