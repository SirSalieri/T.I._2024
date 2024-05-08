<?php
session_start();
require_once '../includes/connect.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login']; // Could be either an email or a username
    $password = $_POST['password'];

    // Determine if login input is an email or username
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM users WHERE email = :login";
    } else {
        $query = "SELECT * FROM users WHERE username = :login";
    }

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username']; // Ensure username is also saved in session if needed
        $_SESSION['role'] = $user['role']; 

        if ($_SESSION['role'] === 'admin') {
            header("Location: admin_index.php");
        } else {
            header("Location: login_kunde.php"); 
        }
        exit;
    } else {
        $message = 'Login feilet: Ugyldig e-post, brukernavn eller passord';
    }
}

// if (isset($_SESSION['message'])) {
//     $message = $_SESSION['message'];
//     unset($_SESSION['message']);
// }
?>


<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg Inn - Kundeservice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<style>
.navbar {
    background-color: rgba(163, 109, 109, 0.8); /* Custom color */
    margin-bottom: 20px;
}

.navbar .navbar-brand, .navbar a {
    color: #fff; 
}

.navbar a:hover {
    text-decoration: underline; /* Hover effect */
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

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(163, 109, 109, 0.8);">    
<div class="container">
        <a class="navbar-brand" href="../index.html">&copy; 2024 Nordpublica</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="register.php" class="btn btn-outline-light">Registrer deg!</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
