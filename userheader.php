<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - User Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles can be added here */
    

    /* #wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    #content {
      flex: 1;
    } */

    .navbar {
      height: 80px; /* Increase the height to your desired value */
    }

    .navbar-brand {
      line-height: 80px; /* Vertically center the text within the header */
    }

    .navbar-dark .navbar-nav .nav-link {
      line-height: 80px; /* Vertically center the text within the header */
    }
  </style>
</head>
<body>
  <div id="wrapper">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Parking Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/userdashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/parkingslot.php">Parking Slots</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/show.php">Vehicle History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/current_parked.php">Current Parked</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/account-setting.php">Account Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/park1/home.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div id="content">
      <!-- Page content goes here -->
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


