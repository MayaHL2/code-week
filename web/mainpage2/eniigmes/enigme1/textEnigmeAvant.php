<div class="det">
                <p>La victime du meurtre a été identifée ; c’est, malheureusement, la présidente du Club d’Activités Polyvalentes : Mouna Gaouar. 
                  Les enquêteurs se donnent pour mission de chercher le numéro de badge de la victime, pour se faire, ils contactent le directeur de l’hôtel qui leur annonce une mauvaise nouvelle : la liste des présents à cet événement a été cryptée pour ne pas être lisible par n’importe qui et l’informaticien responsable du complexe est introuvable.
                   Ayant des connaissances en programmation, les enquêteurs vous contactent pour les aider à décrypter les données de la liste et trouver le numéro de badge de Mouna. Le directeur vous révèle alors la chose suivante :
                   “Cette liste a été cryptée à travers un cryptage de César avec la clé <span style="color:red">10</span>”.  
                  La liste est mise à votre disposition et il vous est demandé de trouver le numéro de la ligne où se trouve le nom “Gaouar Mouna”, ce numéro représente son numéro de badge.</p>
                  <form action="index.php" method="POST" enctype="multipart/form-data">
                    <a href="names.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if (isset($_SESSION["solution"])) {
                            
                          if ($_POST["solution"]==$_SESSION["solution"]) {
                           echo '<script type="text/javascript">
                            window.location.href = \'index.php\';
                            </script>';

                            $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                            

                            $request->execute(array(
                              'enigme1' => 1, 
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
                      <p>
                    </div>

                  </form>
                  PS : Veuillez télécharger la base de données à nouveau, un bug au niveau du serveur a causé un échange au niveau des bases de données relatives à chaque participant. Veuillez accepter nos sincères excuses pour ce désagrément. Le problème vient d'être réglé.</p>
              </div>