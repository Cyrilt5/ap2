<?php 
session_start();
require("requete.php");//appelle page de requête
$pdo=connexion();//appelle fonction pour connexion a bdd

$i=0;
// stocker les données de la bdd dans des tableaux 
$stmt=reservation($pdo,$_POST['salle']);// Récupérer les données nécessaires depuis la base de données
while ($row =$stmt->fetch()){
    $i++;
    $dates[$i]=$row['dates'];
    $heure[$i]=$row['heure'];
    $salle[$i]=$row['nom_salle'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="planing.css" rel="stylesheet">
        <title>Document</title>
    </head>
        <body>
        <div class="container">
                <div class="row">
                    <article class="col-md-5">
                        <nav class = "navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header"> 
                                    <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'salle_dispo.php'">retour </button>
                                    <h5 class="d-inline p-2 text-bg-dark">maison des ligues de lorraine</h5>
                                    <h5 class="d-inline p-2 text-bg-dark" style="margin-top: 15px">page d'accueil</h5>
                                    <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                                    
                                </div>
                            </div>
                        </nav>
                    </article>
                </div>
        </div>
            <?php
            
            
                $j=0;
                echo'
                    <div class="planning">
                        <div class="planning-row">
                            <div class="planning-cell planning-header">Jour</div>
                            <div class="planning-cell planning-header">Heure</div>
                            <div class="planning-cell planning-header">salle prise</div>
                        </div>';
                $date_prochaine = date('Y-m-d', strtotime('+7 day'));
                while($j<count($dates)){
                    $j++;
                    if($dates[$j]<=$date_prochaine){

                        echo'        
                                <div class="planning-row">
                                    <div class="planning-cell">'.$dates[$j].'</div>
                                    <div class="planning-cell">'.$heure[$j].'</div>
                                    <div class="planning-cell">'.$salle[$j].'</div>
                                </div>';
                    }
                            
                    
            }
              echo'</div>';
            ?>
        </body>
</html>