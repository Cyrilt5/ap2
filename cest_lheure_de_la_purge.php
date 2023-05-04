<?php
    require("requete.php");
    $pdo=connexion();
    session_start();
    $date_prochaine = date('Y-m-d', strtotime('-2 day'));
    cestlapurge($pdo,$date_prochaine ,$_SESSION['id_user'])
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
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'page_utilisateur.php'">retour </button>
                                <h5 class="d-inline p-2 text-bg-dark">maison des ligues de lorraine</h5>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'planing.php'">planing </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
        </br> 
        <div class="row" style="margin-top: 15px">
            toute les données antérieure à j-2 on était suprimé
        </div>
    </div>
    </body>
</html>