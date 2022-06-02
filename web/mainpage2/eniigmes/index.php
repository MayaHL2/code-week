<?php
  session_start();

  try{
    $bdd= new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e0ebc4ff81106ab','bb21003b2de296','f8cbce0d',array(PDO::ATTR_ERRMODE));
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

$condEnigme1 = False; 
$condEnigme2 = False; 
$condEnigme3 = False; 
$condEnigme4 = False; 
$condEnigme5 = False; 
$condEnigme6 = False; 
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

<body style="
background-size: 100% 100%;
background-repeat: no-repeat;">
  <!-- Header -->
  <section id="header" style=" background-color : #060f16;">
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
            <li class="nav__item"><a class="slc_itm" ><?php echo $_SESSION["pseudo"]; ?></a></li>
            <li><a href="#bg_photo" data-after="accueill">accueil</a></li>
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
    

  <div id="bg">
    
  

  <!-- information section -->

    
  
      
<!--    </div>-->

  <div class="container-margin">
    <main>
      <aside>
        <img src="detective.png" >
    </aside>
        <aside>
            <details>
                <summary>
                    <a href="enigme1/index.php"  target="_blank"><?php $requestEnigme1=$bdd->query('SELECT enigme1,pseudo FROM participant');
                                    
                                    while($enigmeData1=$requestEnigme1->fetch()){
                                      if ($enigmeData1["enigme1"] == 1 and $enigmeData1["pseudo"] == strtolower(htmlspecialchars($_SESSION["pseudo"]))){     
                                      $condEnigme1 = True;                             
                                    }}
                                      if($condEnigme1){
                                          echo '<p style="color: green;">Enigme 1</p>';}
                                      else{
                                        echo " Enigme 1";
                                      }
                                    
                                     ?></a>
                </summary>
                
            </details>
            <details >
                <summary class="eng2">
                  <a href="enigme2/index.php" target="_blank"><?php $requestEnigme2=$bdd->query('SELECT enigme2,pseudo FROM participant');
                                    
                                    while($enigmeData2=$requestEnigme2->fetch()){
                                      if ($enigmeData2["enigme2"] == 1 and $enigmeData2["pseudo"] == strtolower(htmlspecialchars($_SESSION["pseudo"]))){                                 
                                         $condEnigme2 = True;                             
                                    }}
                                      if($condEnigme2){
                                          echo '<p style="color: green;">Enigme 2</p>';}
                                      else{
                                        echo " Enigme 2";
                                      }
                                    
                                     ?></a>
                </summary>
                
                
            </details>
            <details>
                <summary>
                  <a href="enigme3/index.php?enigme=3" target="_blank"><?php $requestEnigme3=$bdd->query('SELECT enigme3,pseudo FROM participant');
                                    
                                    while($enigmeData3=$requestEnigme3->fetch()){
                                      if ($enigmeData3["enigme3"] == 1 and $enigmeData3["pseudo"] == strtolower(htmlspecialchars($_SESSION["pseudo"]))){                                 
                                         $condEnigme3 = True;                             
                                    }}
                                      if($condEnigme3){
                                          echo '<p style="color: green;">Enigme 3</p>';}
                                      else{
                                        echo " Enigme 3";
                                      }
                                    
                                     ?></a>
                </summary>
                
            </details>
            <details>
                <summary>
                  <a href="enigme3/index.php?enigme=4" target="_blank"><?php $requestEnigme4=$bdd->query('SELECT enigme4,pseudo FROM participant');
                                    
                                    while($enigmeData4=$requestEnigme4->fetch()){
                                      if ($enigmeData4["enigme4"] == 1 and $enigmeData4["pseudo"] == $_SESSION["pseudo"]){                                 
                                         $condEnigme4 = True;                             
                                    }}
                                      if($condEnigme4){
                                          echo '<p style="color: green;">Enigme 4</p>';}
                                      else{
                                        echo " Enigme 4";
                                      }
                                    
                                     ?></a>
                </summary>
                
            </details>
            <details>
                <summary>
                  <a href="enigme3/index.php?enigme=5" target="_blank"><?php $requestEnigme5=$bdd->query('SELECT enigme5,pseudo FROM participant');
                                    
                                    while($enigmeData5=$requestEnigme5->fetch()){
                                      if ($enigmeData5["enigme5"] == 1 and $enigmeData5["pseudo"] == $_SESSION["pseudo"]){                                 
                                         $condEnigme5 = True;                             
                                    }}
                                      if($condEnigme5){
                                          echo '<p style="color: green;">Enigme 5</p>';}
                                      else{
                                        echo " Enigme 5";

                                      } ?></a>
                </summary>
               
            </details>
            <details>
                <summary>
                  <a <?php
             if ($condEnigme1 && $condEnigme2 && $condEnigme3 && $condEnigme4 && $condEnigme5) {
                echo 'href="enigme3/index.php?enigme=6"';
              }
            else{
                echo 'href="#"';
            }
              ?>
               
               target="_blank">
               <?php 
               $requestEnigme6=$bdd->query('SELECT enigme6,pseudo FROM participant');
                                    
                  while($enigmeData6=$requestEnigme6->fetch()){
                    if ($enigmeData6["enigme6"] == 1 and $enigmeData6["pseudo"] == $_SESSION["pseudo"]){                                 
                        $condEnigme6 = True;                             
                    }
                  }
                  if ($condEnigme1 && $condEnigme2 && $condEnigme3 && $condEnigme4 && $condEnigme5) {
                    if($condEnigme6){
                      echo '<p style="color: green;">Enigme 6</p>';}
                    else{
                      echo " Enigme 6";
                    }
                  }
                  else{
                    echo "<p style=\"color: gray;\"> Enigme 6</p>";
                  }
          ?></a>
                </summary>
       
              </details>
        </aside>
        
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
      <p>Club d'Activités Polyvalentes © 2021 </p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>