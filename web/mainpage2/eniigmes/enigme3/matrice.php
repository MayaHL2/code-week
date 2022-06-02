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
$matrice = array();

$i = 0;

$myfile = fopen("matrice.txt", "r") or die("Unable to open file!");


while(!feof($myfile)) {
  $matrice[$i] = fgets($myfile) . "<br>";
  $i++;
}

 
for ($j=0; $j < count($matrice); $j++) { 
  echo $matrice[$j];
}


fclose($myfile);
?>