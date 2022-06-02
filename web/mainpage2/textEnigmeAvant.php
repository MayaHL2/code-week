<div class="det">
                 <p>Les enquêteurs sont entrés dans la chambre de Mouna et y ont trouvé le testament de la victime mais celui-ci ne contient aucun nom, il y est juste écrit au feutre noir : 
                  <span style="color: red;">“Je lègue tout mon argent à ma sœur."</span>
                  Ce qui vous permet de trouver un suspect et un mobile à celui-ci, puisque la seule personne bénéficiant de ce décès est celle qui héritera de la fortune de la victime. Les enquêteurs vous donnent accès à une liste contenant des informations sur les membres de la famille de Mouna sous la forme présentée ci-dessous, à travers un exemple : 
                  <ul>
                  <li>Manel est la cousine de Melissa</li>
                  <li>Imane est la soeur de Ghiles </li>
                  <li>Mohand est le frère de Mélissa</li>
                  <li>Alyssa est la mère de Ghiles …</li>
                  </ul>
                  Il vous est demandé de trouver le prénom de la sœur à Mouna. </p>
                  <form action="index.php" method="POST" enctype="multipart/form-data">
                    <a href="listHotel.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if ($_POST["solution"]==$_SESSION["solution"]) {
                           echo '<script type="text/javascript">
                            window.location.href = \'index.php\';
                            </script>';

                            $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                            

                            $request->execute(array(
                              'enigme4' => 1, 
                              'pseudo' => $pseudo
                            ));
                          }
                          else{
                            echo "<br> Vous avez entré la mauvaise réponse, veuillez réessayer.";
                          }
                        }                         
                        }
                      ?>
                    </div>
                  </form>
              </div>