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
$listArme = array();
$i = 0;

$reponseID=$bdd->query('SELECT idParticipant, pseudo FROM participant');

while($donneesID=$reponseID->fetch()) {
  if($donneesID["pseudo"] == $_SESSION['pseudo']){
    $seed = $donneesID["idParticipant"];
  }
}
srand($seed);

$myfile = fopen("armes.txt", "r") or die("Unable to open file!");

while(!feof($myfile)) {
  $listArme[$i] = fgets($myfile) . "<br>";
  $i++;
}


shuffle($listArme);

$shortlistArme = array();

for ($j=0; $j < 999; $j++) { 
	$shortlistArme[$j] = $listArme[$j];
}

$shortlistArme[$j] = "Boule (Pointe,Chaude,Bleu,Pleine,10 cm) Boule (Pointe,Chaude,Blanc,Pleine,12 cm)<br>";

shuffle($shortlistArme);
$solution = 0; 

for ($j=0; $j < 1000; $j++) { 
  echo $shortlistArme[$j];
  if (strpos(strtolower($shortlistArme[$j]), "bleu")!== false && strpos(strtolower($shortlistArme[$j]),"chaude")!== false) {
    $line = explode("cm)",$shortlistArme[$j] );
    if ((strpos(strtolower($line[0]), "boule (pointe")!== false && strpos(strtolower($line[0]),"pleine,12")!== false) || (strpos(strtolower($line[1]), "boule (pointe")!== false && strpos(strtolower($line[1]),"pleine,12")!== false)){
        $solution += 1; 
    }
  }
}

$_SESSION['solution'] = $solution;

fclose($myfile);
?>