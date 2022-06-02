<?php 
date_default_timezone_set('Africa/Algiers');

$time = strtotime('2021-06-13 18:00:00');

//echo 'event happened '.humanTiming($time).' ago';

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        3600 => 'heures',
        60 => 'minutes',
        1 => 'secondes'
    );

    $timeArray = array();
    foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      $timeArray[$text] = $numberOfUnits;
    }

    foreach ($timeArray as $text => $timeUnit) {
      if ($timeUnit> 60) {
        $timeUnit = $timeUnit % 60;
      }
      echo $timeUnit . ' '. $text. ' ';
    }

    return $time;
}



?>
<div class="det">
                <p>Les enquêteurs après avoir fouiller la pièce de fond en comble trouve une ancienne photo, ils reconnaissent de suite Mouna. Une fille est prêt d'elle, elles sont toutes les deux adolescentes, la photo est intitulé : " Ma sœur Rocky et moi ". Sa sœur porte des vêtements dans le style "rockstar". Un gribouille se trouve au bas de la feuille. C'EST UNE MENACE ! Les enquêteurs vous entourent la phrase la plus incompréhensible : " the person is em a one vivid smart cruel criminal annoyed sended mouna sms a <br>Shout the person ".<br>
                Vous prenez votre ordinateur avec une lumière dans les yeux. Vous savez qui a commis le crime, il vous suffit juste de le confirmer à travers la base de données de l'hôtel. <br>
                Entrez le nom de la meurtrière.</p>
                <p>Indice : La menace contient une autre phrase que vous n'avez pas compris : <span style="color : red">"I only speack Rockstar"</span></p>
                  <form action="index.php?enigme=6" method="POST" enctype="multipart/form-data">
                    <a href="listHotelFinale.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if ($_POST["solution"]=="Malika Bouzertit" || $_POST["solution"] == "Bouzertit Malika") {
                           echo '<script type="text/javascript">
                            window.location.href = \'index.php?enigme=6\';
                            </script>';

                            $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                            
                            $request6->execute(array(
                              'enigme6' => 1, 
                              'enigme6secondes' => humanTiming ($time),
                              'pseudo' => $pseudo
                            ));
                          }
                          else{
                            echo "<br> Vous avez entré la mauvaise réponse, veuillez réessayer.";
                          }
                        }                      
                        }
                      ?>
                    </div>
                  </form>
              </div>