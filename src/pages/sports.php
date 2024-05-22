 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="sports.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <link rel="stylesheet" href="https://github.com/googlefonts/Pacifico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <title>Sports News - NordPublica</title>
</head>

<style>
body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set minimum height of the viewport */
    margin: 0; /* Reset default body margin */
}

.slider-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -111; 
}

.slider img {
  width: 100%;
  height: auto;
}

.mainheader {
background-color: #333;
color: white;
text-align: center;
padding: 20px 0;
}

.logo {
  padding: 5px;
  background-color: rgba(163, 109, 109, 0.8);
  border-radius: 5px;
  font-family: 'Orbitron', sans-serif;
}

nav {
background-color: #333;
color: white;
padding: 10px;
text-align: center;
font-size: 1.3rem;

}
nav a {
color: white;
text-decoration: none;
margin: 0 10px;
}
section {
padding: 20px;
text-align: center;
}

img {
max-width: 100%;
height: auto;
}

h2 {
  font-size: 20px;
  margin-top: 10px;
}

footer {
background-color: #333;
padding: 20px 0;
}

footer {
    background-color: #333;
    padding: 20px 0;
    color: #fff; 
}

.footer-container {
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
}

.footer-links ul li a:hover {
    text-decoration: underline;
}

</style>
<body>
    <body style="background-color: #f2f2f2;">
        <header class="mainheader">
            <div class="logo">
                <h1 href="../index.php">NordPublica</h1>
            </div>
            <div class="slider-container">
                <div class="slider">
                    <img src="pics/road.jpg" alt="Image 1">
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php" style="font-family: Pacifico;">Back to Home</a>
            <h2 class="navbar-title" style="color: white; font-style: Tillana;">About Us</h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calMAP.html">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="na-link" href="weather.html">Weather Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../LOG_IN_SYSTEM/login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </nav>
 
        <section>
            <h2>Sports News</h2>
            <div class="articles">
                <?php
                require_once '../includes/connect.php'; 
    
                try {
                    $stmt = $conn->prepare("SELECT * FROM articles WHERE category = 'sports'");
                    $stmt->execute();
    
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    if ($result) {
                        foreach ($result as $article) {
                            echo "<div class='news'>";
                            echo "<img src='" . htmlspecialchars($article['image_url']) . "' alt='" . htmlspecialchars($article['image_alt']) . "' style='width:100%;'>";
                            echo "<h3>" . htmlspecialchars($article['title']) . "</h3>";
                            echo "<p>" . htmlspecialchars($article['content']) . "</p>";
                            echo "<a href='article_detail.php?id=" . htmlspecialchars($article['id']) . "'>Read More</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No articles found.</p>";
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
            </div>
        </section>
    
     
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
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
                      <a href="calMAP.html">
                          <img src="./pics/NEW_CALENDAR-.png" alt="Calendar Icon"> Calendar
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="weather.html">
                          <img src="./pics/weathercolorful-.png" alt="Weather Icon"> Weather
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="sports.php">
                          <img src="./pics/sportcolorfulTEST-.png" alt="Sports Icon"> Sports News
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
</body>
</html>