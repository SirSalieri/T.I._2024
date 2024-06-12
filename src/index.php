<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Correct the require statement to use proper concatenation
require __DIR__ . '/terminoppgave_innlevering/vendor/autoload.php';
require __DIR__ . '/terminoppgave_innlevering/src/includes/connect.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

function fetch_articles_by_position($conn, $position) {
    try {
        $sql = "SELECT title, content, category, image_url FROM articles WHERE position = :position ORDER BY publish_date DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        }
        return $result;
    } catch (PDOException $e) {
        echo "Error fetching article: " . $e->getMessage();
    }
}

$breaking_news = fetch_articles_by_position($conn, 'breaking');
$local_updates = fetch_articles_by_position($conn, 'local_updates');
$sports_news = fetch_articles_by_position($conn, 'sports_news');
?>


$breaking_news = fetch_articles_by_position($conn, 'breaking');
$local_updates = fetch_articles_by_position($conn, 'local_updates');
$sports_news = fetch_articles_by_position($conn, 'sports_news');
?>


<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="google-site-verification" content="Nj4zbBgB_2Cp41vj8FsE70peiAZndKFTnP2y6bEVcFg" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://github.com/googlefonts/Pacifico">
    <title>NordPublica</title>
    <script type="text/javascript">
    var _iub = _iub || [];
    _iub.csConfiguration = {"askConsentAtCookiePolicyUpdate":true,
    "enableFadp":true,
    "enableLgpd":true,
    "enableUspr":true,
    "fadpApplies":true,
    "floatingPreferencesButtonCaptionColor":"#FFFFFF",
    "floatingPreferencesButtonDisplay":"bottom-right",
    "lang":"en",
    "perPurposeConsent":true,
    "siteId":3408466,"usprApplies":true,
    "whitelabel":false,
    "cookiePolicyId":11384679, 
    "banner":{ "acceptButtonDisplay":true,
    "closeButtonDisplay":false,
    "customizeButtonDisplay":true,
    "explicitWithdrawal":true,
    "listPurposes":true,
    "position":"float-top-center",
    "rejectButtonDisplay":true,
    "showTitle":false }};
    </script>
    
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview');
    </script>
    <script type="text/javascript" src="https://cs.iubenda.com/autoblocking/3408466.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/gpp/stub.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
</head>
<style>
  
body {
  background: #93d4c4; 
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  width: 100%; 
  height: 100%;
  overflow-x: hidden;
}

.whited_in {
  background-color: white;
  width: 80%;
  margin: 0 auto;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.container {
  max-width: 1200px;
  width: 80%; 
  margin: 20px auto; 
  padding: 20px;
  border-radius: 8px; 
}

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

.ar-titl {
  font-size: 2.2rem; 
  padding: 15px;
  font-weight: bold;
  text-align: center;
}

.articles {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  padding: 20px 0;
}

.news {
  flex: 0 1 calc(33.333% - 40px);
  max-width: calc(33.333% - 40px);
  padding: 20px;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
}

@media (max-width: 768px) {
  .news {
    flex: 0 1 100%;
    max-width: 100%;
  }
}

.card {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.15s ease-in-out;
}

.card:hover {
    transform: translateY(-7px);
}

.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body h5 {
    color: #0056b3; 
}

.news h3 {
    color: #0056b3; 
  font-size: 1.8rem;
}

.news p, .news a {
  font-size: 1.1rem;
}

.news a:hover {
  color: #0056b3;
  text-decoration: underline; /* More noticeable hover effect */
}

.news:hover {
  transform: scale(1.03); /* Slight zoom on hover */
  transition: transform 0.3s ease-in-out;
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
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
    text-align: center;
}

.footer-links ul li a {
  color: #0056b3; 
  font-weight: bold; 
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
   text-shadow: none; 
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
              <img src="pics/road.jpg" alt="Image 1">
          </div>
      </div>
    <nav>
      <a href="pages/about.php">About us</a>
      <a href="pages/weather.html">Weather information</a>
      <a href="pages/calMAP.html">Calendar</a>
      <a href="pages/contact.html">Contact us</a>
      <a href="LOG_IN_SYSTEM/login.php">Login/Register</a>
  </nav>
  </header>

  <div class="whited_in">  

<div class="container mt-5">
  <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
        <img src="<?php echo htmlspecialchars($breaking_news['image_url']); ?>" class="card-img-top" alt="Breaking News Image">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($breaking_news['title']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($breaking_news['content']); ?></p>
            <a href="pages/breaking.html" class="btn btn-primary">Read More</a>
        </div>
      </div>

      </div>
      <div class="col-md-4 mb-4">
          <div class="card">
              <img src="<?php echo htmlspecialchars($local_updates['image_url']); ?>" class="card-img-top" alt="Local Events Image">
              <div class="card-body">
                  <h5 class="card-title">Local Events</h5>
                  <p class="card-text"><?php echo htmlspecialchars($local_updates['content']); ?></p>
                  <a href="pages/local.html" class="btn btn-primary">Read More</a>
              </div>
          </div>
      </div>
      <div class="col-md-4 mb-4">
          <div class="card">
              <img src="<?php echo htmlspecialchars($sports_news['image_url']); ?>" class="card-img-top" alt="Sports Update Image">
              <div class="card-body">
                  <h5 class="card-title">Sports Update</h5>
                  <p class="card-text"><?php echo htmlspecialchars($sports_news['content']); ?></p>
                  <a href="pages/sports.php" class="btn btn-primary">Read More</a>
              </div>
          </div>
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
                  <a href="pages/calMAP.html">
                      <img src="./pics/NEW_CALENDAR-.png" alt="Calendar Icon"> Calendar
                  </a>
              </li>
              <li class="foot-li">
                  <a href="pages/weather.html">
                      <img src="./pics/weathercolorful-.png" alt="Weather Icon"> Weather
                  </a>
              </li>
              <li class="foot-li">
                  <a href="pages/sports.php">
                      <img src="./pics/sportcolorfulTEST-.png" alt="Sports Icon"> Sports News
                  </a>
              </li>
          </ul>
      </div>
  </div>
</div>
</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
