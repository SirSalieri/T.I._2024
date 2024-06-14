 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://github.com/googlefonts/Pacifico">
    <title>About NordPublica</title>
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(90deg,#e52e71,#ff8a00);
}

.slider-thumb::before {
  position: absolute;
  content: "";
  left: 30%;
  top: 20%;
  width: 450px;
  height: 450px;
  background: #17141d;
  border-radius: 62% 47% 82% 35% / 45% 45% 80% 66%;
  will-change: border-radius, transform, opacity;
  animation: sliderShape 5s linear infinite;
  display: block;
  z-index: -1;
  -webkit-animation: sliderShape 5s linear infinite;
}
@keyframes sliderShape{
  0%,100%{
  border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  34%{
      border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%;
    transform:  translate3d(0,5px,0) rotateZ(0.01deg);
  }
  50%{
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  67%{
    border-radius: 100% 60% 60% 100% / 100% 100% 60% 60% ;
    transform: translate3d(0,-3px,0) rotateZ(0.01deg);
  }
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
<body style="background-color: #f2f2f2; color: white;">
    <header class="mainheader">
        <div class="logo">
            <h1>NordPublica</h1>
        </div>
    </header>
    <div class="slider-thumb"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php" style="font-family: Pacifico;">Back to Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calMAP.html">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="weather.html">Weather Info</a>
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

    <main class="container">
        <section class="about-section">
            <h1 class="a-title">About NordPublica</h1>
            <p class="h-text" style="font-size: 1.4rem;">
                NordPublica is an open and free information portal dedicated to providing you with the latest updates and insights into the world of Unity and game development.
            </p>
        </section>

        <section class="history-section" style="font-size: 1.2rem;">
            <div class="history-item">
                <div class="content-item">
                    <img src="../pics/Newspapers_1.jpg" alt="Image 1">
                    <p class="a-parphs">
                        NordPublica began its journey in the year 2005 with a passionate group of developers, envisioning a platform that could transform the landscape of game development. Inspired by the idea of fostering innovation and accessibility within the gaming community, our founders set out on an ambitious quest to democratize game development tools.
                    </p>
                </div>
            </div>

            <div class="history-item">
                <div class="content-item">
                    <img src="../pics/about_pic2.jpg" alt="Image 2">
                    <p class="a-parphs">
                        The initial years were a testament to perseverance and dedication, as NordPublica navigated through the challenges of a rapidly evolving industry. We focused on crafting intuitive frameworks and cultivating a supportive ecosystem that empowered developers worldwide to bring their visions to life.
                    </p>
                </div>
            </div>

            <div class="history-item">
                <div class="content-item">
                    <img src="../pics/PhotoAbout.jpg" alt="Image 3">
                    <p class="a-parphs">
                        As the gaming landscape expanded, so did our commitment. Through countless iterations and innovations, NordPublica continued to refine its platform, introducing breakthrough features and resources that enriched the experiences of both aspiring and seasoned developers.
                    </p>
                </div>
            </div>

            <div class="history-item">
                <div class="content-item">
                    <img src="../pics/PhotoAbout.jpg" alt="Image 4">
                    <p class="a-parphs">
                        Today, NordPublica stands as a beacon of creativity and unity within the gaming community. With a global network of developers and a dedication to empowering creativity, we continue to evolve, striving to redefine the boundaries of possibility in game development.
                    </p>
                </div>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

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
                          <img src="../pics/NEW_CALENDAR-.png" alt="Calendar Icon"> Calendar
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="weather.html">
                          <img src="../pics/weathercolorful-.png" alt="Weather Icon"> Weather
                      </a>
                  </li>
                  <li class="foot-li">
                      <a href="sports.php">
                          <img src="../pics/sportcolorfulTEST-.png" alt="Sports Icon"> Sports News
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
</html>
