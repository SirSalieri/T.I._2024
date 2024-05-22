<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../includes/connect.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../support');
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Establish a database connection using PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die("Connection failed: " . $e->getMessage());
}

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['register-name'];
    $surname = $_POST['register-surname'];
    $username = $_POST['register-username'];
    $email = $_POST['register-email'];
    $password = $_POST['register-password']; // Securely hash this password

    // Hash password using a strong hashing mechanism
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (name, surname, username, email, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $surname, $username, $email, $hashed_password])) {
        $response = ["success" => true];
        echo json_encode($response);
    } else {
        $response = ["success" => false, "message" => "Error in registration."];
        echo json_encode($response);
    }
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer - Nordpublica</title>
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
                    <h3 class="card-title text-center mb-4">Registrer Deg</h3>
                    <form action="handle_register.php" method="post">
                    <form action="handle_register.php" method="post">
                        <div class="form-group">
                            <label for="name">Navn</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Etternavn</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Brukernavn</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Passord</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Bekreft Passord</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrer</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Allerede har en konto? <a href="login.php">Logg inn nå</a>.</p>
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

