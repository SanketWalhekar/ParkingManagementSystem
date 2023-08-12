<?php
require 'connection.php';
$sql="UPDATE `register` SET `password`='123' WHERE 'email'='fw19if002@gmail.com'";
$result=mysqli_query($conn,$sql);
{
      if($result)
      {
            // echo "Yes";
      }
      else{
            // echo "No";
      }
}
?>

