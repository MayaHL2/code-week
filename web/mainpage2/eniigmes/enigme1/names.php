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
  <meta charset='UTF-8'>
  <title>codeweek</title>
</head>
<?php
$listNames = array();
$i = 0;

$reponseID=$bdd->query('SELECT idParticipant, pseudo FROM participant');

while($donneesID=$reponseID->fetch()) {
  if(strtolower($donneesID["pseudo"]) ==strtolower($_SESSION['pseudo'])){
    $seed = $donneesID["idParticipant"];
  }
}


srand($seed);

$myfile = fopen('names.txt', 'r') or die('Unable to open file!');

while(!feof($myfile)) {
  $listNames[$i] = fgets($myfile) . '<br>';
  $i++;
}

$organisateur = array('Lourdiane Camélia' , 'Aouni Wassim' ,'Gaouar Mouna' ,'Zegaoui Walid' ,'Lamri Salma Yasmine' ,'Aissaoui Mohamed' ,'Hocine Meriem', 'Hadj lazib Maya' ,'Sahari Asma','Akhrouf Abderrahim' ,'Haouya Ines' , 'Saidoune Nermine','Salmi Khaled', 'Khedache Kenza','Benamirouche Abdelhak','Kobbi Islem' ,' Grira Ayemen','El Gamah Ahmed Wassim','Mendjel Nacira','Hafdi Mohamed Habib ', 'Cheriat Sabrina ');


shuffle($listNames);

$shortListName = array();

for ($j=0; $j < 1000; $j++) { 
  $shortListName[$j] = $listNames[$j];
}

for($n=0; $n < count($organisateur); $n++){
  $shortListName[$j+1] = ' '.$organisateur[$n]. '  <br>';
  $j++;
}

shuffle($shortListName);

$_SESSION['solution']=array_search(" Gaouar Mouna  <br>", $shortListName)+1; // La solution

$cryptage = 10;

for ($m=0; $m < count($shortListName); $m++) { 
  for($l = 1; $l < strlen($shortListName[$m])-6; $l++){
        //echo ord($shortListName[$m][$l]) + $cryptage." ";
      if ($shortListName[$m][$l] != " " && $shortListName[$m][$l] != "'") {
        echo chr(((ord(strtolower($shortListName[$m][$l])) + $cryptage) - 96)% 26 + 96);
      }
      elseif ($shortListName[$m][$l] == " "){
          echo " ";
       } 
      else{
        echo "'";
      } 
    }
    echo "<br>";

}


fclose($myfile);
?>