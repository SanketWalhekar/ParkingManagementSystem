<!DOCTYPE html>
<html lang="en">

<head>
 
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
          </li>
        </ul>
      </div>
    </nav>
