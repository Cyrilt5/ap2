<?php
require("requete.php");
$pdo=connexion();
$stmt=salle_dispo($pdo,$_POST['date'],$_POST['heure']);
$j=0;
while ($row =$stmt->fetch()){
    $j++;
    $nombresalle[$j] =$row['nom_salle'];
}
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
    <body>
        <div id="display-element">
                            <article class="col-md-3">
                                <h4>quelle salle vouler vous reserver ?</h4>
                                    <SELECT name="salle" id="heure" size="1">
                                    <OPTION>
                                    <?php
                                        for($i=1;$i<COUNT($nombresalle)+1;$i++){
                                            print_r("<OPTION value='".$nombresalle[$i]."'>".$nombresalle[$i]."</OPTION>");
                                        }
                                    ?>
                                    </SELECT>

                                <p id="resultat"></p>
                                <p id="resultat2"></p>
                            </article>
                            </div>
        </div>
    </body>
</html>