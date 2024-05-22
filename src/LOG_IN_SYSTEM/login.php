<?php
session_start();
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']); 
?>


<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg Inn - Kundeservice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
</head>
<style>
    
header {
  width: 100%;
  color: white;
  background-color: #333; 
  text-align: center;
  padding: 10px 0;
}

.logo {
  padding: 5px;
  background-color: transparent;
  border-radius: 5px;
  font-family: 'Orbitron', sans-serif;
  text-align: center;
}

nav {
  display: flex;
  justify-content: center; 
  background-color: #444;
  padding: 10px 0;
  width: 100%; 
}

nav a {
  text-decoration: none;
  color: white;
  margin: 0 15px;
  font-size: 1.2rem;
}

nav a:hover {
  color: #dddddd; 
  text-decoration: underline;
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

footer {
  background-color: #333;
  color: #fff;
  /* position: fixed; */
  bottom: 0;
  left: 0; 
  width: 100%;
}

.footer-container {
    background-color: rgba(51, 51, 51, 0.9); /* Darker background for footer */
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
    text-align: center;
}

.footer-links ul {
    display: flex;
    padding: 0;
    list-style-type: none;
}

.footer-links ul li {
    margin: 10px;
    display: flex;
    align-items: center; 
}

.footer-links ul li img {
    width: calc(40px + 45px);
    height: auto;
    display: block;
    margin: 0 auto;
}

.footer-links ul li a {
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1rem;
    text-shadow: none; /* No shadow needed due to sufficient contrast */
}

.footer-links ul li a:hover {
    text-decoration: underline;
}

</style>
<body>
<header class="mainheader">
      <div class="logo">
        <h1>NordPublica</h1>
      </div>
      <div class="slider-container">
          <div class="slider">
              <img src="../pics/road.jpg" alt="Image 1">
          </div>
      </div>
    <nav>
        <a href="../index.php"> Home </a>
        <a href="../pages/about.php">About us</a>
        <a href="../pages/weather.html">Weather information</a>
        <a href="../pages/calMAP.html">Calendar</a>
        <a href="../pages/contact.html">Contact us</a>
    </nav>
  </header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Logg Inn</h3>
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-warning text-center">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <form action="handle_login.php" method="post">
                        <div class="form-group">
                            <label for="login">Email eller Brukernavn</label>
                            <input type="text" class="form-control" id="login" name="login" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Passord</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Logg Inn</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Har du ikke en konto? <a href="register.php">Registrer deg nå</a>.</p>
            </div>
        </div>
    </div>
</div>


<footer>
      <div class="footer-container">
          <div class="footer-contact">
              <h4>Contact Us</h4>
              <p>Email: <br> mihailokoprivica480@gmail.com</p>
              <p>Phone: <br> (+47) 973 26 424</p>
              <p>Address: <br> Sinsenterrassen 14, 0574 Oslo, Norway
              </p>
          </div>
          <div class="footer-designer">
              <h4>Designed by</h4>
              <p>Designer Name</p>
          </div>
          <div class="footer-links">
              <h4>Explore</h4>
              <ul class="foot-ul">
                  <li class="foot-li">
                      <a href="../pages/calMAP.html">
                          <img src="../pics/NEW_CALENDAR-.png" alt="Calendar Icon"> Calendar
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="../pages/weather.html">
                          <img src="../pics/weathercolorful-.png" alt="Weather Icon"> Weather
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="../pages/sports.html">
                          <img src="../pics/sportcolorfulTEST-.png" alt="Sports Icon"> Sports News
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
