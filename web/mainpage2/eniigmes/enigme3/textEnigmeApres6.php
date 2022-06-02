<?php 
date_default_timezone_set('Africa/Algiers');

$time = strtotime('2021-06-13 20:00:00');

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
}


?>

Félicitions !<br>
Vous avez résolu la dernière énigme en <?php humanTiming ($time); ?>. <br>
Merci pour votre participation, les enquêteurs vous sont très reconnaissants. Vous avez été brillant et avez résolu un des plus grand mystère du CAP. Si vous voulez savoir si vous faîtes parti du top 3, rendez-vous sur les réseaux du CAP disponible ci-dessous ! CAPtech vous dit à la prochaine !<br>

PS : un grand merci à Malika Bouzertit qui a accepté de jouer le jeu ! 
Elle vous a d'ailleurs laissé un petit message : "C'était un plaisir pour moi d'être la meurtirière de votre semaine ! Bon courage pour vos examens."