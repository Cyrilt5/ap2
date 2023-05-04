<?php
session_start();
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
                </div>
                    
                </br>
                <div class="row">
                    <article class="col-md-1">
                        <button class="btn btn-danger" type ="submit">ok</button>
                    </article>
                </div>  
            </form>
            <div class="row" style="margin-top: 15px">
                <form action= "salle_dispo.php" method="post">
                    <article class="col-md-3">
                        <button class="btn btn-danger" type ="submit">voir le planing des salles</button>
                    </article>
                </form>
            </div>
            <div class="row" style="margin-top: 15px">
                <form action= "cest_lheure_de_la_purge.php" method="post">
                    <article class="col-md-3">
                        <button class="btn btn-danger" type ="submit">purge</button>
                    </article>
                </form>
            </div>
        </div>
    </body>
</html>