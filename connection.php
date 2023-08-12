<?php
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "park"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// if($conn)
// {
//     echo"connection Successfull";

// }
// else
// {
//     echo "Connection Unsuccessfull";
// }
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful, you can now execute database queries

// Example query to retrieve data from a table
// $sql = "SELECT * FROM adminlogin";
// $result = $conn->query($sql);

// // Check if any rows were returned
// if ($result->num_rows > 0) {
//     // Loop through each row
//     while ($row = $result->fetch_assoc()) {
//         // Access individual columns using column names
//         $column1 = $row["username"];
//         $column2 = $row["password"];
//         // Process the data
//         // ...
//     }
// } else {
//     echo "No results found.";
// }

// echo $column1; 
// echo $column2;
// Close the connection

?>