<div class="det">
                <p>L’hôtel contient plusieurs espaces dont, à votre grande surprise, un musée d’art moderne. Le médecin légiste avait justement découvert que l’arme du crime est l’une des différentes sculptures qui y sont exposées. Seulement, le nombre de sculptures est énorme et cela prendrait une éternité d’y jeter un œil une par une pour confirmer la correspondance avec les informations révélées par le médecin légiste. Après votre grande aide durant la phase de recherche précédente, les enquêteurs vous font maintenant entièrement confiance et vous révèlent des informations sur la supposée arme du crime pour que vous les aidiez à la trouver à travers une base de données des œuvres d’art de l’hôtel. En effet, les informations après le bilan du docteur sont les suivantes : <br>
                <span style="color: red;">“ L’arme est une boule pleine ayant plusieurs pointes et un rayon de 12 cm. Des traces de peinture bleue ont été laissées sur le corps de la victime et plusieurs traces de brûlures couvrent son corps.”</span><br>
                L’hôtel a une base de données contenant les différentes œuvres de leur musée. Elles sont organisées comme suit : <br>
                <span>Forme1 (Info1, info2, info3 …) Forme2 (Info1, info2, info3 …)<br></span>
                N’hésitez pas à jeter un œil à la base de données pour vous aider à résoudre cette énigme. 
                Entrez le nombre d'œuvres d’art correspondant à cette description. <br>

                </p>
                  <form action="index.php" method="POST" enctype="multipart/form-data">
                    <a href="armes.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if (isset($_SESSION["solution"])) {
                          if ($_POST["solution"]==$_SESSION["solution"]) {
                            echo "good";
                           echo '<script type="text/javascript">
                            window.location.href = \'index.php\';
                            </script>';

                            $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                            

                            $request->execute(array(
                              'enigme2' => 1, 
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