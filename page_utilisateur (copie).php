<!DOCTYPE html>
    <html>
        <head>
            <title>formulaire</title>
            <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
    <body>
    <div class="container">
            <div class="row">
                <article class="col-md-5">
                    <nav class = "navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header"> 
                                <h5 class="d-inline p-2 text-bg-dark">maison des ligue</h5>
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
                        <?php   require 'requete.php';
                                
                            
                            ?>
                        </SELECT>
                </article>
            </div>-->
            <form action= "utilisateur.php" method="post">
                <div class="row" style="margin-top: 15px">
                    <article class="col-md-3">
                        <h4>quelle est la date de votre reservation?</h4>
                        <p>il est impossible de reserver pour la journé actuelle</p>
                            <SELECT name="date" id="date" size="1">
                            <OPTION>
                            <?php      
                                $jour_actuel = date("Y-m-d");
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

                               // echo "</table>";
                            ?>  
                            </SELECT>
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
                    <div id="display-element" style="display:none;">
                    <article class="col-md-3">
                        <h4>quelle salle vouler vous reserver ?</h4>
                            <SELECT name="salle" id="heure" size="1">
                            <OPTION>
                            </SELECT>

                        <p id="resultat"></p>
                        <p id="resultat2"></p>
                    </article>
                    </div>
                </div>
                    <div class="row" style="margin-top: 15px">
                </br>
                <div class="row">
                    <article class="col-md-1">
                    <button class="btn btn-danger" type ="submit">ok</button>
                    </article>
                </div>  
            </form>
        </div>
        <script src="utilisateur.js"></script>
    </body>
</html>