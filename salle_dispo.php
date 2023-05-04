<?php
    require("requete.php");
    $pdo=connexion();
    session_start();
    $stmt=salle_proposer($pdo);
    $j=0;
    $i=0;
    $id_salle=[];
    while ($row =$stmt->fetch()){
        $j++;
        $nomsalle[$j] = $row['nom_salle'];
        $id_salle[$j] = $row['id_salle'];
    }
    $stmts=type_salle($pdo);// Récupérer les données nécessaires depuis la base de données
    while ($row =$stmts->fetch()){
        $i++;
        $type[$i]=$row['nom_type'];
        $id_type[$i]=$row['id_type'];
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
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
        </br> 
        <div class="row" style="margin-top: 15px">
            <form action= "planing.php" method="post">
                <article class="col-md-5">
                    <h4>le planing de quelle salle voulez-vous regarder ?</h4>
                        <SELECT name="salle" id="salle" size="1">
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
            <form action= "creationsalle.php" method="post">
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
            <form action= "updatesalle.php" method="post">
                <article class="col-md-5">
                        <h4>quelle salle voulez-vous modifier ?</h4>
                            <SELECT name="salle" id="salle" size="1">
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
            <form action= "deletesalle.php" method="post">
                <article class="col-md-5">
                    <h4>quelle salle voulez-vous suprimer ?</h4>
                        <SELECT name="id" id="id" size="1">
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