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
$listHotelFaux = array();

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

$myfileFaux = fopen("listHotelFaux.txt", "r") or die("Unable to open file!");

$g = 0;
while(!feof($myfileFaux)) {
  $listHotelFaux[$g] = fgets($myfileFaux) . "<br>";
  $g++;
}


shuffle($listHotel);
shuffle($listHotelFaux);

$shortListHotel = array();

$sol = random_int(10, 80);

for ($j=0; $j < 998-($sol+50); $j++) { 
  $shortListHotel[$j] = $listHotel[$j];
}

for ($k=$j; $k <998; $k++) { 
  $shortListHotel[$k] = $listHotelFaux[$k-$j];
}




$shortListHotel[$k] = "Bouzertit Malika 19/02/2000 0555876531 110056812114653075 A+<br>";

$shortListHotel[$k+1] = "Atchi Malik 12/09/1999 0540657285 019988811118881111 A+<br>";

 shuffle($shortListHotel);
 
for ($j=0; $j < 1000; $j++) { 
  echo $shortListHotel[$j];
}

$_SESSION['solution']=$sol + 50;

fclose($myfile);
fclose($myfileFaux);
?>