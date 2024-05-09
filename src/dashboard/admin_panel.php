<?
// require_once 'authentication.php';
require_once __DIR__ . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <style>
        header {
            width: 100%;
            color: white;
            background-color: #333;
            padding: 10px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between; /* Aligns children to the edges */
            align-items: center;
        }

        .logo {
            margin: 0 auto; /* Centers the logo within the flex container */
            padding: 5px;
            background-color: transparent;
            border-radius: 5px;
            font-family: 'Orbitron', sans-serif;
            text-align: center;
        }

        .slider-container {
            width: 100%;
            overflow: hidden;
            max-height: 300px;
        }

        .slider img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            display: block;
        }

        .button-container {
            margin-bottom: 20px;
        }
        footer {
            background-color: rgba(51, 51, 51, 0.9); /* Darker background for footer */
            color: #fff;
            bottom: 0;
            left: 0; 
            width: 100%;
        }

        .footer-container {
            max-width: 1200px;
            min-height: 20vh;
            margin: 0 auto;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="mainheader">
    <div class="header-content">
        <div class="logo">
            <h1>NordPublica</h1>
        </div>
        <div class="logout">
            <a href="../LOG_IN_SYSTEM/logout.php" class="btn btn-outline-light">LOGG UT</a>
        </div>
    </div>
    <div class="slider-container">
        <div class="slider">
            <img src="../pics/road.jpg" alt="Image 1">
        </div>
    </div>
</header>

<div class="container mt-5 text-center" style="min-height: 40vh;">
    <h1>Welcome to the Admin Panel!</h1>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 button-container">
            <a href="../templates/management.php" class="btn btn-primary btn-lg btn-block">Manage Users</a>
        </div>
        <div class="col-md-4 button-container">
            <a href="../templates/articles.php" class="btn btn-secondary btn-lg btn-block">Manage Articles</a>
        </div>
        <div class="col-md-4 button-container">
            <a href="../templates/last_login.php" class="btn btn-success btn-lg btn-block">Activity Tracker</a>
        </div>
        <div class="col-md-4 button-container">
            <a href="../templates/tickets.php" class="btn btn-info btn-lg btn-block">Manage Tickets</a>
        </div>
    </div>
</div>
<footer>
  <div class="footer-container">
      <div class="footer-designer">
          <h4>Designed by</h4>
          <p>Designer Name</p>
      </div>
  </div>
</div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
