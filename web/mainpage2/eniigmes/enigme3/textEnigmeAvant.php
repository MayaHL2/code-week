<div class="det">
  <p>Vous apprenez que le meurtrier a eu accès à la base de données de l’hôtel avant les enquêteurs et l’a modifié pour y ajouter des informations erronées. Encore une fois, étant le meilleur programmeur présent ce soir là, les enquêteurs vous sollicitent afin de trier la base de données de l’hôtel sachant qu’elle était censée être organisée comme suit : <br> <br>

<span style="color: red">Nom &nbsp; &nbsp; &nbsp;  prénom &nbsp; &nbsp; &nbsp;   date de naissance  &nbsp; &nbsp; &nbsp;   numéro de téléphone    &nbsp;   &nbsp; &nbsp; NIN  &nbsp;   &nbsp; &nbsp;  Groupe sanguin</span><br>

Sachant que : <br>
<ul>
 <li> Les clients présents dans l’hôtel ont tous une date de naissance allant de Janvier 1988 à Décembre 2001.</li>
 <li> Le NIN (numéro d’identité national) contient 18 chiffres et est organisé de manière à ce que les deux premiers chiffres soient égaux à "00", "01", "10" ou "11", que les chiffres à la troisième, quatrième et cinquième position représentent les trois derniers chiffres de l'année de naissance (le reste sont des chiffres aléatoires).</li>
 <li> Les numéros de téléphone sont tous issus de téléphones mobiles.</li>
</ul>
Trouvez les informations erronées à partir de la base de données suivante et insérez le nombre de lignes contenant celles-ci. 
                  <form action="index.php?enigme=3" method="POST" enctype="multipart/form-data">
                    <a href="listHotel.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if (isset($_SESSION["solution"])) {
                            if (strtolower($_POST["solution"])==$_SESSION["solution"]) {
                             echo '<script type="text/javascript">
                              window.location.href = \'index.php?enigme=3\';
                              </script>';

                              $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                              

                              $request->execute(array(
                                'enigme3' => 1, 
                                'pseudo' => $pseudo
                              ));
                            }
                            else{
                              echo "<br> Vous avez entré la mauvaise réponse, veuillez réessayer.";
                            }
                          }
                          else{
                            echo "<br> Veuillez retélécharger la base de données.";
                          }
                        }                    
                      }
                      ?>
                    </div>
                  </form>
              </div>