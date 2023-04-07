<?php
print_r($_SESSION);
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>formulaire</title>
            <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
    <body>
    <div class="container">
            <div class="row">
                <article class="col-md-7">
                    <nav class = "navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header"> 
                                <h5 class="d-inline p-2 text-bg-dark">maison des ligues de lorraine</h5>
                                <h5 class="d-inline p-2 text-bg-dark" style="margin-top: 15px">page d'accueil</h5>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
            <!--<div class="row" style="margin-top: 15px">
                 <article class="col-md-3">
                    <h4>quelle est la date de votre reservation?</h4>
                        <SELECT name="prio" id="prio" size="1">
                        <OPTION>-----
s
                        </SELECT>
                </article>
            </div>-->
            <form action= "utilisateur.php" method="post">
                <div class="row" style="margin-top: 15px">
                    <article class="col-md-3">
                        <h4>quelle est la date de votre reservation?</h4>
                            <input type="date" name="date" id="date"/>
                            <!--<SELECT name="date" id="date" size="1">
                            <OPTION>
                            <?php      
                                /**$jour_actuel = date("Y-m-d");
                                for ($i = 0; $i < 365; $i++) {
                                    $jour = date("Y-m-d", strtotime("+$i days"));
                                    if ($jour == $jour_actuel) {
                                        continue;
                                    }
                                    // Exécutez le reste du code de la boucle pour les journées qui ne sont pas égales à la journée actuelle
                                $timestamp_aujourdhui = strtotime($jour_actuel);
                                $timestamp_jour = $timestamp_aujourdhui + $i * 24 * 3600;
                                $date_jour = date("Y-m-d", $timestamp_jour);
                                echo "<OPTION value=".$date_jour.">" . $date_jour . "</OPTION>";
                                }

                               // echo "</table>";*/
                            ?> 
                            </SELECT>-->
                    </article>
                </div>
                <div class="row" style="margin-top: 15px">
                    <article class="col-md-3">
                        <h4>quelle est l'heure de votre reservation?</h4>
                        <p>vous resever pour une plage de 1h</P>
                            <SELECT name="heure" id="heure" size="1">
                            <OPTION>
                            <?php
                                for ($i = 8; $i < 21; $i++) {
                                echo "<OPTION value=".date("H:i:s", strtotime("$i:00:00")).">"  . date("H:i:s", strtotime("$i:00:00")) . "</OPTION>";
                                }
                            ?>
                              </SELECT>
                    </article>
<!--*******************************************************fenétre qui s'affiche quand on choisie quelque chose sur les ****************************************************-->

                </div>
                    
                </br>
                <div class="row">
                    <article class="col-md-1">
                        <button class="btn btn-danger" type ="submit">ok</button>
                    </article>
                </div>  
            </form>
            <div class="row" style="margin-top: 15px">
                <form action= "planing.php" method="post">
                    <article class="col-md-3">
                        <button class="btn btn-danger" type ="submit">voir le planing des salles</button>
                    </article>
                </form>
            </div>
        </div>
    </body>
</html>