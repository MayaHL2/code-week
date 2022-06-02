<?php
  session_start();
  /*'bb21003b2de296','f8cbce0d'*/

  try{
    $bdd= new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e0ebc4ff81106ab','bb21003b2de296','f8cbce0d',array(PDO::ATTR_ERRMODE));
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

  $conditionConnexion = false;
  $conditionNom = false;
  $conditionPrenom=false;
  $conditionEmail=false; 
  $conditionPassword=false;
  $conditionPseudoIscription=false;
  $existancePseudo=false;
  $existanceEmail=false;

  $condRequestPseudo=false; 
  $condRequestEmail=false; 

  $request=$bdd->prepare('INSERT INTO participant (nom, prenom, mail, password, pseudo) VALUES (:nom, :prenom,:mail,:password,:pseudo)');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/codeweeklogo.png">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
  <title>codeweek</title>
</head>

<body style="background-image: url(bg3.png);
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
            <li><a href="#bg_photo" data-after="Home">accueil</a></li>
            <li><a href="#contact" data-after="reglements">Règlement</a></li>
            <li><a href="#footer" data-after="Contact">Contacts</a></li>
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
            
            <h1>Code week </h1>
            <h2>&lt; let's code! &gt;</h2>
            <p class="p1">Code week est un événement organisé par</p>
            <p class="p2">la section scientifique du CAP qui se déroule</p>
            <p class="p3"> sur six jours en ligne. Chaque jour,</p>
            <p class="p4">une énigme, qui ne peut être résolue</p>
            <p class="p5"> qu’à travers la programmation, est publiée.</p> 
            <a href="#inscription" type="button" class="cta" id="inscrr" style="font-size: 15px; font-weight: 800;">S'inscrire</a>
            <a href="#connexion" type="button" class="cta" id="inscrr" style="font-size: 15px; font-weight: 800;">Se connecter</a>
            
      </div>
      <div class="resp"><img src="./img/fin cw_loog.png" alt="codweek logo"></div>

    </div>
  </section>
  <!-- End bg Secton  -->

  <div id="bg">
    
  <!-- <inscription> -->
    <div id="inscription">
      <h1 class="section-title">Inscr<span>i</span>ption</h1>
      <div class="containerrr">
        <div class="contentt">
          <form action="index.php#inscription" method="POST" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
                <p style="color:red"></p>
                <span class="details" >Nom <span id="star">*</span></span>
                <input type="text" name="nom" placeholder="Entrez votre nom" required>
                <?php  
              if (isset($_POST["inscription"])) {
                  if(!isset($_POST['nom'])){
                        echo 'Veuillez entrer votre nom';
                        
                    }
                    else{
                        if(strlen($_POST['nom'])>100){
                            echo "Le nom que vous avez entré est trop long.";
                            
                        }
                        else{
                            $conditionNom =true;
                        }
                    }
                  }?>
              </div>
              <div class="input-box">
                <span class="details">Prénom <span id="star">*</span></span>
                <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
                <?php
                if (isset($_POST["inscription"])) {
                  if(!isset($_POST['prenom']))
                    {
                        echo '<p style="color:red">Veuillez entrer votre prénom</p>';
                        
                    }
                    else{
                        if(strlen($_POST['prenom'])>100)
                        {
                            echo "<p style=\"color:red\">Le prénom que vous avez entré est trop long.</p>";
                            
                        }
                        else{

                            $conditionPrenom=true;
                        }
                    }
                }?>
              </div>
              <div class="input-box">
                <span class="details">Adresse email <span id="star">*</span></span>
                <input type="email" name="email" placeholder="Entrez votre boite email" required>
                <?php
                if (isset($_POST["inscription"])) {
                  if(!isset($_POST['email']))
                    {
                        echo '<p style="color:red">Veuillez entrer votre boite email.</p>';
                        
                    }
                    else{
                        if(strlen($_POST['email'])>200)
                        {
                        }
                        else{
                        
                                if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $_POST['email']))
                                {
                                    $requestEmail=$bdd->query('SELECT mail FROM participant');

                                    while($reponseEmail=$requestEmail->fetch()){

                                      if (strtolower(htmlspecialchars($reponseEmail["mail"]))==strtolower(htmlspecialchars($_POST['email']))) {
                                        $condRequestEmail = true; 
                                      }

                                    }
                                    
                                    if($condRequestEmail){
                                        echo "<p style=\"color:red\">Cette boite mail existe déjà.</p>";
                                        
                                    }
                                    else{
                                        $conditionEmail=true;
                                    }
                                }
                                else{
                                    echo "<p style=\"color:red\">Ceci n'est pas une boite email.</p>";
                                    
                                }   
                        

                        }
                    }    
                }?>
              </div>
              <div class="input-box">
                <span class="details">Pseudo <span id="star">*</span></span>
                <input type="text" name="pseudoInscription" placeholder="Entrez votre pseudo" required>
                <?php
                if (isset($_POST["inscription"])) {
                  if(!isset($_POST['pseudoInscription']))
                    {
                        echo '<p style="color:red">Veuillez entrer votre pseudo</p>';
                        
                    }
                    else{

                        if(strlen($_POST['pseudoInscription'])>100)
                        {
                            echo "<p style=\"color:red\">Le pseudo que vous avez entré est trop long.</p>";
                            
                        }
                        else{
                          $requestPseudo=$bdd->query('SELECT pseudo FROM participant');
                          while($reponse=$requestPseudo->fetch()){
                            if (trim(strtolower(htmlspecialchars($reponse["pseudo"])))==trim(strtolower(htmlspecialchars($_POST['pseudoInscription'])))) {
                              $condRequestPseudo = true; 
                            }
                          }
                                    
                            if($condRequestPseudo){
                              echo "<p style=\"color:red\">Ce pseudo existe déjà.</p>";
                            
                            }
                            else{
                              $conditionPseudoIscription=true;
                            }
                    }
                }
              }?>
              </div>
              <div class="input-box">
              <span class="details">Lien Facebook <span id="star">*</span></span>
                <input type="text" name="facebook" placeholder="Entrez votre lien Facebook" required>
              </div>
              <div class="input-box">
                <span class="details"> Situation professionnelle <span id="star">*</span></span>
                <input type="text" name="univ" placeholder="Entrez votre situation professionnelle" >
              </div>
              <div class="input-box">
                <span class="details">Mot de passe <span id="star">*</span></span>
                <input type="password" name="passwordInscription1" placeholder="Entrez votre mot de passe" required>
              </div>
              <div class="input-box">
                <span class="details">Confirmer le mot de passe <span id="star">*</span></span>
                <input type="password" name="passwordInscription2" placeholder="Confirmer votre mot de passe" required>
              <?php 
              if (isset($_POST["inscription"])) {

                    if(!isset($_POST['passwordInscription1']))
                    {
                        echo '<p style="color:red">Veuillez entrer le mot de passe.</p>';
                        
                    }
                    else{
                        if(strlen($_POST['passwordInscription1'])>32)
                        {
                            echo "<p style=\"color:red\">Mot de passe trop long.</p>";
                            
                        }
                        else{
                            if(strlen($_POST['passwordInscription1'])<8){
                                echo "<p style=\"color:red\">Mot de passe trop court</p>";
                                
                            }
                            else{
                              if ($_POST['passwordInscription1']!=$_POST['passwordInscription2']) {
                                echo "<p style=\"color:red\">Les mots de passe que vous avez entrés ne sont pas les mêmes.</p>";
                                
                              }
                              else{
 
                                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['passwordInscription1'])) {
                                    $conditionPassword=true;
                                }
                                
                                else {
                                    echo '<p style="color:red">Le mot de passe doit contenir au moins une majuscule, un chiffre et un caractère spécifique</p>';
                                    
                                }
                              }
                            }
                        }
                    }

              }
             ?>
              </div>
            </div>
            <div class="button">
              <input type="submit" name="inscription" value="S'inscrire">
            </div>
            <?php 
              if (isset($_POST["inscription"])) {
                if($conditionNom && $conditionPrenom && $conditionPseudoIscription && $conditionPassword && $conditionEmail) {
                  echo '<script type="text/javascript">window.location.href = \'mainpage2/index.php\';</script>';

                    $_SESSION['pseudo']=trim(strtolower(htmlspecialchars($_POST['pseudoInscription'])));

                    $request->execute(array(
                      'nom'=>strtolower(htmlspecialchars($_POST['nom'])),
                      'prenom'=>strtolower(htmlspecialchars($_POST['prenom'])),
                      'mail'=>strtolower(htmlspecialchars($_POST['email'])),
                      'password'=>($_POST['passwordInscription1']),
                      'pseudo'=>trim(strtolower(htmlspecialchars($_POST['pseudoInscription'])))
                      ));

                  }
              }

             ?>
          </form>
        </div>
      </div>
  </div>
   <!-- End inscription  -->
  
  
     <!-- connexion -->
  <div id="connexion">
    <h1 class="section-title">Conn<span>ex</span>ion</h1>
    <div class="containerrr">
      <div class="contentt">
        <form action="index.php#connexion" method="POST" enctype="multipart/form-data">
          <div class="user-details">
              <span class="details">Pseudo <span id="star">*</span></span>
              <input type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
            </div>
            <div class="user-details">
              <span class="details">Mot de passe <span id="star">*</span></span>
              <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="button">
              <input type="submit" value="connecter" name="connexion">           
          </div>
              <?php 
                if (isset($_POST["connexion"])) {   
                  $reponseConnexion=$bdd->query('SELECT pseudo,password FROM participant');
                    while($donneesConnexion=$reponseConnexion->fetch()) {
                      if(trim(strtolower(htmlspecialchars($donneesConnexion["pseudo"])))==trim(strtolower(htmlspecialchars($_POST['pseudo']))) && $donneesConnexion["password"]==$_POST['password']){
                        $conditionConnexion = true;
                      }
                    }
                    if($conditionConnexion)
                      {
                      echo '<script type="text/javascript">
                          window.location.href = \'mainpage2/index.php\';
                          </script>';

                      $_SESSION['pseudo']=trim(strtolower(htmlspecialchars($_POST['pseudo'])));
                    }
                    else{
                      echo "<p style=\"color:red\">Vérifiez les informations que vous avez entrées.</p>";
                    }
                  $reponseConnexion->closeCursor();
                  }
                
                 ?>
        </form>
      </div>
    </div>
</div>
   <!-- end connexion -->
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
  <script src="js/app.js"></script>
</body>

</html>