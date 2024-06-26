 <?php
if (isset($_SERVER['HTTP_X_FORWARDED_URL']) && strpos($_SERVER['HTTP_X_FORWARDED_URL'], '.w3spaces-preview.com/') !== false) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}
?>

<!DOCTYPE html>
<html lang="en">
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
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  min-height: 100vh; 
  margin: 0;

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

.ar-titl {
  background-color: rgb(204, 204, 204, 0.4);
  color: #000000;
  width: auto;
  padding: 15px; 
  text-align: center; 
  font: 2rem bold;
  font-family: Arial, sans-serif;
}

.articles{
  display: flex;
  flex-wrap: wrap;
  gap: 50px;
}

.news {
  flex: 1;
  max-width: calc(33.3333% - 20px);
  border: 1px solid #ddd;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.news img {
  max-width: 100%;
  height: auto;
}

.news h3 {
  font-size: 1.5rem;
  margin-top: 10px;
}

.news p {
  font-size: 1rem;
  margin-top: 10px;
}

.news a {
  display: block;
  text-align: right;
  margin-top: 10px;
  text-decoration: none;
  color: #007BFF;
  font-weight: bold;
  transition: color 0.3s;
}

.news a:hover {
  color: #0056b3;
}

footer {
    background-color: #333;
    padding: 20px 0;
    color: #fff;
    margin-top: auto;
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
    <header class="mainheader">
        <div class="logo">
            <h1 href="../logged-in.html">NordPublica</h1>
        </div>
        <div class="slider-container">
            <div class="slider">
                <img src="pics\44453.jpg" alt="Image 1">
            </div>
        </div>
    </header>
    
    <nav>
        <a href="admin_panel.php">About us</a>
        <a href="weather.html">Weather information</a>
        <a href="calMAP.html">Calendar</a>
        <a href="contact.html">Contact us</a>
        <a href="../LOG_IN_SYSTEM/logout.php">Log Out</a>
    </nav>

    <div class="in-container">
        <h2 class="ar-titl">Stay in touch with the daily news from overall Scandinavia</h2>
        <?php
        // Connect to your database
        // Perform a SELECT query to fetch articles
        // Loop through the retrieved articles and display them
        ?>
        <!-- Sample Article Template -->
        <div class="articles">
            <article class="news">
                <img src="./pics/erna.jpg" alt="News Image 1">
                <h3>Breaking News</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget libero non quam iaculis scelerisque.</p>
                <a class="link-more" href="breaking.html">Read More</a>
            </article>
        
            <article class="news">
                <img src="./pics/Politi-til-stedet.jpg" alt="News Image 2">
                <h3>Local Events</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                <a class="link-more" href="local.html">Read More</a>
            </article>
        
            <article class="news">
                <img src="./pics/sports_bildet.jpg" alt="News Image 3" href="sports.php">
                <h3>Sports Update</h3>
                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                <a class="link-more" href="sports.php">Read More</a>
            </article>
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
                    <li class="foot-li">
                      <a href="admin_panel.php">
                          <img src="./pics/admins22.ico" alt="Sports Icon"> Admin's Control Panel for administrators
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>

