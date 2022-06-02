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
  <link rel="icon" type="image/png" href=".../web/img/fin cw_loog.png">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
  <title>codeweek</title>
</head>

<body style="background-image: url(/img/bg3.png);
background-size: 100% 100%;
background-repeat: no-repeat;">
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
            <li><a href="#bg_photo" data-after="Home">accueil</a></li>
            <li><a href="eniigmes/index.php" data-after="Enigmes">Enigmes</a></li>
            <li><a href="#contact" data-after="reglements">Règlement</a></li>
            <li><a href="#footer" data-after="Contact">Contacts</a></li>
            <!-- <li><a href="#" data-after="Sortir">Sortir</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header  -->

  <!-- bg Section  -->
  <section id="bg_photo">
    <div class="bg_photo container">
      <div class="contentt"  >
            
        <h1>Bienvenu <?php echo $_SESSION["pseudo"]; ?></h1>
        <h2>&lt;Let's code &gt;</h2>
            <p class="p1">Un crime a été commis et les agents </p>
            <p class="p2">de police ont été appelés pour trouver </p>
            <p class="p3">le meurtrier. Il vous a été demandé de </p>
            <p class="p4">ne quitter les lieux sous aucun prétexte.</p>
            <p class="p5">  Vous êtes ainsi que des milliers de personnes </p> 
            <p class="p6"> enfermés dans un énorme hôtel avec un meutrier. </p> 
            <a  echo href="eniigmes/index.php" type="button" class="cta" id="inscrr" style="font-size: 15px; font-weight: 800;">Commencer</a>
            <!-- <a href="#connexion" type="button" class="cta" id="inscrr" style="font-size: 15px; font-weight: 800;">Se connecter</a> -->
      </div>
      <div class="resp"><img src="./img/fin cw_loog.png" alt="codweek logo"></div>

    </div>
  </section>
  <!-- End bg Secton  -->

  <div id="bg">
    
  

  <!-- information section -->
  <section id="contact">
    <h1 class="section-title" >REGL<span>EM</span>ENTS</h1>
    <div class="contact container">
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="./img/number.png" /></div>
          <div class="contact-info">
            <!-- <h1></h1> -->
            <h2>Le code qui permet de trouver la solution n’est pas demandé.</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="./img/number (1).png" /></div>
          <div class="contact-info">
            <h2>Chaque participant a une base de données propre à lui, demander la réponse à un autre participant est donc inutile. 
 
              </h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="./img/number (2).png" /></div>
          <div class="contact-info">
            <h2>Chaque compte est associé à UNIQUEMENT un seul participant, dans le cas contraire, le participant sera sanctionné. 
            </h2>
          </div>
        </div>
      </div>
    
      <div id="top" class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="./img/number (3).png" /></div>
          <div class="contact-info">
            <!-- <h1></h1> -->
            <h2>Le gagnant sera désigné automatiquement selon le temps de réponse à la DERNIÈRE énigme uniquement. 
            </h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="./img/number (4).png" /></div>
          <div class="contact-info">
            <h2>Afin de débloquer une énigme, il faut répondre correctement à toutes les énigmes qui la précèdent. 
            </h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="./img/number (5).png" /></div>
          <div class="contact-info">
            <h2>La difficulté des énigmes augmente de jour en jour. 
            </h2>
          </div>
        </div>
      </div>

    </div>
  </section>
  <div class="but">
  <a href="eniigmes/index.php" type="button" class="cta" id="inscrr" style="font-size: 15px; font-weight: 800;">Résoudre les énigmes</a>
</div>
    <!--end information section -->

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
  <script src="js/app.js"></script>
</body>

</html>