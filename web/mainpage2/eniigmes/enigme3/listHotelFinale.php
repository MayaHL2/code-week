<?php 
  session_start();

  try{
    $bdd= new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e0ebc4ff81106ab','bb21003b2de296','f8cbce0d',array(PDO::ATTR_ERRMODE));
  }
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }
  
?>
<head>
  <meta charset="UTF-8">
  <title>codeweek</title>
</head>
<?php
$listHotel = array();

$i = 0;

$reponseID=$bdd->query('SELECT idParticipant, pseudo FROM participant');

while($donneesID=$reponseID->fetch()) {
  if($donneesID["pseudo"] == $_SESSION['pseudo']){
    $seed = $donneesID["idParticipant"];
  }
}
srand($seed);

$myfile = fopen("listHotel.txt", "r") or die("Unable to open file!");


while(!feof($myfile)) {
  $listHotel[$i] = fgets($myfile) . "<br>";
  $i++;
}




shuffle($listHotel);

$shortListHotel = array();

$sol = random_int(10, 80);

for ($j=0; $j < 998-($sol+50); $j++) { 
  $shortListHotel[$j] = $listHotel[$j];
}




$shortListHotel[$j] = "Bouzertit Malika 19/02/2000 0555876531 110056812114653075 A+<br>";

$shortListHotel[$j+1] = "Atchi Malik 12/09/1999 0540657285 019988811118881111 A+<br>";

 shuffle($shortListHotel);
 
for ($j=0; $j < 1000; $j++) { 
  echo $shortListHotel[$j];
}

fclose($myfile);
?>