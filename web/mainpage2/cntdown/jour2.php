<?php
  session_start();

  try{
    $bdd= new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e0ebc4ff81106ab','bb21003b2de296','f8cbce0d',array(PDO::ATTR_ERRMODE));
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
  <title>codeweek</title>
</head>
 
<body >
  <!-- Header -->
  <section id="header">
    <div class="header container" >
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li class="nav__item"><a href="#" class="slc_itm" ><?php echo $_SESSION["pseudo"]; ?></a></li>
            <li><a href="#bg_photo" data-after="Accueil">Accueil</a></li>
            <li><a href="#footer" data-after="Contact">Contact</a></li>
            <!-- <li><a href="#" data-after="Sortir">Sortir</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header  -->

  <!-- bg Section  -->
  <section id="bg_photo">
    

  <div id="bg">
    
  

  <!-- information section -->
    <div id="cd">
      <div class="countdown">
  
        <div class="countdown-block">
          <span class="days time-elem">
            <span class="top">00</span>
            <span class="top-back">
              <span>00</span>
            </span>
            <span class="bottom">00</span>
            <span class="bottom-back">
              <span>00</span>
            </span>
          </span>
          <span class="title">Days</span>
        </div>
       
    
        <div class="countdown-block">
          <span class="hours time-elem">
            <span class="top">00</span>
            <span class="top-back">
              <span>00</span>
            </span>
            <span class="bottom">00</span>
            <span class="bottom-back">
              <span>00</span>
            </span>
          </span>
          <span class="title">Hours</span>
        </div>
        
    
        <div class="countdown-block">
          <span class="minutes time-elem">
            <span class="top">00</span>
            <span class="top-back">
              <span>00</span>
            </span>
            <span class="bottom">00</span>
            <span class="bottom-back">
              <span>00</span>
            </span>
          </span>
          <span class="title">Minutes</span>
        </div>
    
        <div class="countdown-block">
          <span class="seconds time-elem">
            <span class="top">00</span>
            <span class="top-back">
              <span>00</span>
            </span>
            <span class="bottom">00</span>
            <span class="bottom-back">
              <span>00</span>
            </span>
          </span>
          <span class="title">Seconds</span>
        </div>
  
      </div>
  
      
    </div>


      <!--end information section -->
        <div id="bg" >
    
  






  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <img src="img/caplogo.png" alt="codweek" class="logof">
      </div>
      <div class="social-icon">
        <div class="social-item">
          <a href="https://web.facebook.com/CAP10.ENP" target="_blank"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.instagram.com/cap.enp/?hl=fr" target="_blank"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.twitter.com/cap.enp/" target="_blank"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.linkedin.com/cap.enp/" target="_blank"><img src="https://img.icons8.com/bubbles/100/000000/linkedin.png" /></a>
        </div>
      </div>
      <p>Club d'Activités Polyvalentes © 2021</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <script src="js/appJ2.js"></script>
</body>

</html>