<?php
    require("requete.php");
    $pdo=connexion();
    session_start();
    update_salle($pdo,$_POST['nomsalle'],$_POST['type'],$_SESSION['id_salle']);
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>formulaire</title>
            <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
    <body>
    <div class="container">
          la salle a été modifier
    </div>
    </body>
</html>