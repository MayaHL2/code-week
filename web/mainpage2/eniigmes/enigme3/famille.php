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
$famille = array();
$familleMouna = array();

$i = 0;

$reponseID=$bdd->query('SELECT idParticipant, pseudo FROM participant');

while($donneesID=$reponseID->fetch()) {
  if($donneesID["pseudo"] == $_SESSION['pseudo']){
    $seed = $donneesID["idParticipant"];
  }
}
srand($seed);

$myfile = fopen("famille.txt", "r") or die("Unable to open file!");


while(!feof($myfile)) {
  $famille[$i] = fgets($myfile) . "<br>";
  $i++;
}

$myfileMouna = fopen("familleMouna.txt", "r") or die("Unable to open file!");

$g = 0;
while(!feof($myfileMouna)) {
  $familleMouna[$g] = fgets($myfileMouna) . "<br>";
  $g++;
}


shuffle($famille);
shuffle($familleMouna);

$shortfamille = array();

for ($j=0; $j < count($famille); $j++) { 
  $shortfamille[$j] = $famille[$j];
}

for ($k=$j; $k <count($famille) + count($familleMouna); $k++) { 
  $shortfamille[$k] = $familleMouna[$k-$j];
}


shuffle($shortfamille);
 
for ($j=0; $j < 1000; $j++) { 
  echo $shortfamille[$j];
}


fclose($myfile);
fclose($myfileMouna);
?>