<div class="det">
                 <p>Le meurtre a eu lieu dans l’une des chambres de l’hôtel où vous séjournez. Une caméra de surveillance a permis de trouver le numéro de celle-ci : 4828. Seulement, l’hôtel a énormément d’étages et chaque étage contient 3600 pièces dont certaines qui ont été scellées à clé par le meurtrier, ne laissant qu’une seule entrée possible pour accéder à la pièce en question. Les enquêteurs et vous-même cherchez à accéder à la salle où le meurtre a été commis le plus rapidement possible. Seulement, chercher l’entrée qui vous mènera à la pièce en question, sans être bloqué par une porte fermée, va prendre une éternité. Heureusement, le directeur de l’établissement vous donne accès à la version numérique du plan de l’hôtel qui recense l’état actuelle des portes et vous précise les règles suivantes :<br>

                <span style="color : red;">“Chaque étage est représenté par une matrice 60*60, les indices permettant de se localiser dans celle-ci, sont représentés par les quatre chiffres du numéro de la chambre (les deux premiers représentent la ligne et les deux derniers, la colonne).”<br></span>
                Vous avez accès à la matrice de l’étage en question. Au moment d’y jeter un œil, vous tombez sur une suite de nombres et vous êtes alors confus, le directeur de l’hôtel vous explique alors que le responsable programmation de l’établissement avait crypté les données pour qu’elle soit plus difficile à lire. Il vous explique alors les règles qui ont permis de générer cette matrice de nombres à travers la matrice initiale représentant les murs et passages de l’étage : <br>
                <span style="color : red;">“Chaque case représente une pièce et on associe à chaque pièce un nombre permettant de définir dans quelles directions il est possible de se déplacer. En effet, le 1 indique qu’il est possible de se déplacer à gauche (aucune porte fermée ne bloque l’accès à la pièce à gauche), le 2 indique qu’il est possible de se déplacer à droite , le 3 en haut et le 4 en bas. Pour définir la possibilité d’aller à gauche et à droite, les nombres 1 et 2 sont placés côte à côte du plus grand au plus petit pour donner le nombre 21. De même pour toutes les autres possibilités à l’exception de la possibilité d’aller dans tous les sens qui est représentée par un 5 et celle qui représente une pièce condamnée qui est cryptée par un 0.”</span><br>
                Vous avez rédigé le texte suivant pour résumer ce que vous savez : <br>
                0 ⇔ bloqué ; 1 ⇔ à gauche ;  2 ⇔ à droite ;  3 ⇔ en haut ;  4 ⇔ en bas ;  21 ⇔ à gauche et à droite  ;  32 ⇔ à droite et en haut …<br>
                Un exemple est illustré par la figure ci-dessous : <br>
                <p><img src="exemple.png"></p>
                <p> Il est demandé d'entrer les quatre chiffres représentant l'entrée par laquelle vous devez passer pour accéder à la pièce (2 chiffres représentant la ligne et 2 représentant la colonne).
                </p>
                  <form action="index.php?enigme=5" method="POST" enctype="multipart/form-data">
                    <a href="matrice.php"  target="_blank"><input type="button" value="telecharger" class="bt"></a>
                    <div  class="cent">
                      <input class="inp" placeholder="reponse" name="solution" type="text">
                      <input type="submit" name="envoyerSolution" value="envoyer" class="bt2"> 
                      <?php
                      if (isset($_POST['envoyerSolution'])) {
                        if(isset($_POST["solution"])){
                          if ($_POST["solution"]=="0132" || $_POST["solution"] == 132) {
                           echo '<script type="text/javascript">
                            window.location.href = \'index.php?enigme=5\';
                            </script>';

                            $pseudo = strtolower(htmlspecialchars($_SESSION['pseudo']));
                            
                            $request5->execute(array(
                              'enigme5' => 1, 
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