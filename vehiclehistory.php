<?php
require 'connection.php';

// // Retrieve parking entries from the database
// $stmt = $conn->query("SELECT * FROM vehicle_entries");
// $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
$userSql = "SELECT * FROM final";
$userResult = mysqli_query($conn, $userSql);
$entries = array();
while ($row = mysqli_fetch_assoc($userResult)) {
    $entries[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Parking Management System</title>
    <style>
        body
        {
            margin-top: 100px;
            margin-bottom:80px;
        }
        table {
            
            margin-bottom:80px;
            border-collapse: collapse;
            width: 100%;
            
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
    <center><h1>Parking Management System-Vehicle Parking History</h1></center>
    <table>
        <thead>
            <tr>
                <th>SLOT ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Vehicle Type</th>
                <th>Car Number</th>
                <th>Entry Date</th>
                <th>Exit Date</th>
                <th>Total Time (Day:Time:Minute)</th>
                <th>Payment</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry): ?>
                <?php
                    $entryDateTime=$entry['entry_date'];
                    $exitDateTime=$entry['Exit Date'];
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
                    
                    
                    
                    ?>
                    
                   
            <tr>
                <td><?php echo $entry['slotid']; ?></td>
                <td><?php echo $entry['name']; ?></td>
                <td><?php echo $entry['address']; ?></td>
                <td><?php echo $entry['phone']; ?></td>
                <td><?php echo $entry['email']; ?></td>

                <td><?php echo $entry['vehicle_type']; ?></td>
                <td><?php echo $entry['car_number']; ?></td>
                <td><?php echo $entry['entry_date']; ?></td>
                <td><?php echo $entry['Exit Date']; ?></td>
                <td><?php echo $days."D:".$remainingHours."H:".$remainingMinutes."M" ?></td>
                <td><?php echo $payment." rs" ?></td>



                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>