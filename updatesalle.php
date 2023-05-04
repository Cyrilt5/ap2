<?php
    require("requete.php");
    $pdo=connexion();
    session_start();
    $stmts=type_salle($pdo);// Récupérer les données nécessaires depuis la base de données
    $j=0;
    while ($row =$stmts->fetch()){
        $j++;
        $type[$j]=$row['nom_type'];
        $id_type[$j]=$row['id_type'];
    }
    $stmt=reservation($pdo,$_POST['salle']);// Récupérer les données nécessaires depuis la base de données
    while ($row =$stmt->fetch()){
        $i++;
        $type[$i]=$row['id_type'];
        $salle[$i]=$row['nom_salle'];
    }
    $_SESSION['id_salle']=$_POST['salle']
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
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'salle_dispo.php'">retour </button>
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
        <form action= "sallemodifier.php" method="post">
                <article class="col-md-5">
                    <h4>voulez-vous créer une salle ?</h4><br/><br/>

                    quelle est le nom de la salle?</br>
                    <input id="nomsalle" type ="text" class="text-primary" name="nomsalle" required><br/>
                    quelle est le type de la salle?</br>
                        <SELECT name="type" id="type" size="1">
                        <OPTION>
                        <?php
                            for($i=1;$i<COUNT($id_type)+1;$i++){
                                print_r("<OPTION value='".$id_type[$i]."'>".$type[$i]."</OPTION>");
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