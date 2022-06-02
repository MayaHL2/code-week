<?php
  session_start();

  try{
    $bdd= new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e0ebc4ff81106ab','bb21003b2de296','f8cbce0d',array(PDO::ATTR_ERRMODE));
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }
  
  $conditionDone3 = False;
  $conditionDone4 = False;
  $conditionDone5 = False;
  $conditionDone6 = False;
  $request =$bdd->prepare('UPDATE participant SET enigme3 = :enigme3 WHERE pseudo = :pseudo');
  $request4=$bdd->prepare('UPDATE participant SET enigme4 = :enigme4 WHERE pseudo = :pseudo');
  $request5=$bdd->prepare('UPDATE participant SET enigme5 = :enigme5 WHERE pseudo = :pseudo');
  $request6=$bdd->prepare('UPDATE participant SET enigme6 = :enigme6, enigme6secondes = :enigme6secondes WHERE pseudo = :pseudo');

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

<body style="background-image: url(cover.png);
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
            <li><a href="../mainpage2/eniigmes/index.php" data-after="Enigmes">Enigmes</a></li>
            <li><a href="#footer" data-after="Contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header  -->

  <!-- bg Section  -->
  <section id="bg_photo">
    

  <div id="bg" >
    
  

 
  <div class="container-margin">
    <main class="txt">
                <div class="icn">
                 <img src="icon/icn.png" alt="one" class="icon">
                 <h1>Enigme <?php echo $_GET['enigme']; ?> :<span></span></h1>
                </div>
                <?php 
              if(isset($_GET['enigme'])){
                if ($_GET['enigme']==3 || $_GET['enigme']=='3') {
                    
                  $requestCheck = $bdd->query('SELECT pseudo, enigme3 FROM participant');
                  while($donnees=$requestCheck->fetch()) {
                        if($donnees["pseudo"]==strtolower(htmlspecialchars($_SESSION['pseudo'])) && $donnees["enigme3"]==1){
                          $conditionDone3 = True; 
                        }
                      }


                  if ($conditionDone3) {
                    include 'textEnigmeApres.php';
                  }
                  else{
                    include "textEnigmeAvant.php";
                  }
                }
                else{
                  if ($_GET['enigme']==4 || $_GET['enigme']=='4') {
                    
                    $requestCheck = $bdd->query('SELECT pseudo, enigme4 FROM participant');

                    while($donnees=$requestCheck->fetch()) {
                          if($donnees["pseudo"]==strtolower(htmlspecialchars($_SESSION['pseudo'])) && $donnees["enigme4"]==1){
                            $conditionDone4 = True; 
                          }
                        }


                    if ($conditionDone4) {
                      include 'textEnigmeApres4.php';
                    }
                    else{
                      include "textEnigmeAvant4.php";
                    }
                  } 
                  else { if ($_GET['enigme']==5 || $_GET['enigme']=='5') {
                    
                      $requestCheck5 = $bdd->query('SELECT pseudo, enigme5 FROM participant');

                      while($donnees=$requestCheck5->fetch()) {
                            if($donnees["pseudo"]==strtolower(htmlspecialchars($_SESSION['pseudo'])) && $donnees["enigme5"]==1){
                              $conditionDone5 = True; 
                            }
                          }


                      if ($conditionDone5) {
                        include 'textEnigmeApres5.php';
                      }
                      else{
                        include "textEnigmeAvant5.php";
                      }
                    }
                  else{
                      $requestCheck6 = $bdd->query('SELECT pseudo, enigme6 FROM participant');

                      while($donnees=$requestCheck6->fetch()) {
                            if($donnees["pseudo"]==strtolower(htmlspecialchars($_SESSION['pseudo'])) && $donnees["enigme6"]==1){
                              $conditionDone6 = True; 
                            }
                          }

                      if ($conditionDone6) {
                        include 'textEnigmeApres6.php';
                      }
                      else{
                        include "textEnigmeAvant6.php";
                      }
                    } 
                  }

                  }
                }

                 ?>
           
    </main>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>