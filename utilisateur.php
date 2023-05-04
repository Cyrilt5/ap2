<?php
    require("requete.php");
    $pdo=connexion();
    session_start();
    $stmt=salle_dispo($pdo,$_POST['date'],$_POST['heure']);
    $j=0;
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['heure'] = $_POST['heure'];
    $id_salle=[];
    while ($row =$stmt->fetch()){
        $j++;
        $nomsalle[$j] = $row['nom_salle'];
        $id_salle[$j] = $row['id_salle'];
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
                <article class="col-md-7">
                    <nav class = "navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header"> 
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'page_utilisateur.php'">retour </button>
                                <h5 class="d-inline p-2 text-bg-dark">maison des ligues de lorraine</h5>
                                <h5 class="d-inline p-2 text-bg-dark" style="margin-top: 15px">page d'accueil</h5>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
        </br> 
        <div class="row" style="margin-top: 15px">
            <form action= "reservation_faite.php" method="post">
                <article class="col-md-5">
                    <input type="date" value="<?php echo $_POST["date"]; ?>" name="date" id="date" disabled/>
                    <input type="heure" value="<?php echo $_POST["heure"]; ?>" name="heure" id="heure" disabled/>
                    <h4>quelle salle voulez-vous réserver ?</h4>
                        <SELECT name="salle" id="heure" size="1">
                        <OPTION>
                        <?php
                            for($i=1;$i<COUNT($nomsalle)+1;$i++){
                                print_r("<OPTION value='".$id_salle[$i]."'>".$nomsalle[$i]."</OPTION>");
                            }
                        ?>
                        </SELECT>
                        <div class="row">
                            <article class="col-md-1">
                                <button class="btn btn-danger" type ="submit">ok</button>
                            </article>
                        </div>  
                </article>
            </form>
        </div>
    </div>
    </body>
</html>