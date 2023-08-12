<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parking Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 50px;
    }

    .navbar {
      background-color: #343a40;
      height: 70px; /* Increase the height to your desired value */
    }

    .navbar-brand {
      color: #fff;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #fff;
      font-size: 1rem;
      margin-left: 10px;
      margin-right: 10px;
    }

    .jumbotron {
      background-color: #fff;
      padding: 2rem;
      
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .display-4 {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    .lead {
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
    }

    .btn-primary {
      font-size: 1.25rem;
      padding: 12px 30px;
    }
    .container
    {
      padding-top:50px;
    }

    
    
    </style>
</head>

<body>
<div id="wrapper">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#">Parking Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/home.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/entry.php">Entry Car</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/park1/contactus.php">Contact</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Login</a>
          <div class="dropdown-menu" aria-labelledby="loginDropdown">
            <a class="dropdown-item" href="http://localhost/park1/userlogin.php">User Login</a>
            <a class="dropdown-item" href="http://localhost/park1/adminlogin.php">Admin Login</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Welcome to Parking Management System</h1>
      <p class="lead">Manage your parking spaces efficiently with our system.</p>
      <a class="btn btn-primary btn-lg" href="http://localhost/park1/userlogin.php" role="button">Get Started</a>
    </div>
    
  </div>
  <?php include 'footer.php'; ?>

  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
