<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - Admin Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
    }
    
    .navbar {
      background-color: #333;
    }
    
    .navbar-brand {
      color: #fff;
      font-size: 1.5rem;
    }
    
    .nav-link {
      color: #fff;
    }
    
    .dashboard-sidebar {
      background-color: #333;
      color: #fff;
    }
    
    .dashboard-sidebar .list-group-item {
      background-color: #333;
      border-color: #333;
    }
    
    .dashboard-sidebar .list-group-item:hover {
      background-color: #222;
      border-color: #222;
    }
    
    .dashboard-content {
      background-color: #fff;
      padding: 20px;
    }
    
    .card-header {
      background-color: #333;
      color: #fff;
      font-weight: bold;
      text-align: center;
    }
    .card{
      allign:center;
      text-align: center;
    }
    .jumbotron {
      margin-top:50px;
      background-color: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Parking Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/admindash.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/vehicle-parked.php">Parked-Vehicle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/vehiclehistory.php">Vehicle-History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/home.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- <div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group dashboard-sidebar">
          <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
          <a href="#" class="list-group-item list-group-item-action">Parking Lots</a>
          <a href="#" class="list-group-item list-group-item-action">Users</a>
          <a href="#" class="list-group-item list-group-item-action">Transactions</a>
        </div>
      </div> -->
      
    </div>
    <div class="container">
    
    <div class="jumbotron">
   
      <h1 class="display-4">Welcome to the Admin Dashboard</h1>
      <p class="lead">Manage your parking spaces efficiently with our system.</p>
      
    </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>
