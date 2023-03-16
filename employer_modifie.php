<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require ("requete.php");
$pdo=connexion();
$numdemande=[];
$objectdemande=[];
$idpriorite=[];
$etat=[];
$user=[];
$j=0; 

$_SESSION['iddemande']=$_POST['demande'];
$stmt=demande_a_faire($pdo);
while ($row =$stmt->fetch()){
    $j++;
    $numdemande[$j] =$row['numdemande'];
    $objectdemande[$j] =$row['objectdemande'];
    $idpriorite[$j] =$row['idpriorite'];
    $etat[$j] =$row['idetat'];
    $user[$j] =$row['iduser'];
    }
if (isset($_SESSION['fonction'])){
    if ($_SESSION['fonction']=='employer'){
            ?>
<!DOCTYPE html>
<html>
<head>
    <title>formulaire</title>
    <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="css/style.css">-->
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
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'employer.php'">retour </button>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">numéro de la demande  </th>
                            <th scope="col">objet de la demande  </th>
                            <th scope="col">priorité de la demande</th>
                            <th scope="col">etat </th>
                            <th scope="col">user </th>
                        </tr>
                    </thead>
                    <tbody><form action= "page_employer_modifier.php" method="post">
                        <?php for($i=1;$i<=$_SESSION['iddemande'];$i++){
                        echo"
                            <tr>
                                <th scope=\"row\">". $numdemande[$i]."</th>
                                <td>".$objectdemande[$i]."</td>
                                <td>".$idpriorite[$i]."</td>
                                <td><textarea id=\"etat\" name=\"etat\"
                                rows=\"5\" cols=\"33\" required>".$etat[$i]."</textarea></td>
                                <td>".$user[$i]."</td>
                            </tr>
                        ";}?>
                        <article class="col-md-1">
                            <button class="btn btn-danger" type ="submit">ok</button>
                        </article>
                        </form>
                    </tbody>
                </table>
        </form>
        </div>
    </div>
</body>
</html>
<?php }}else{echo('session inexistante');}?>