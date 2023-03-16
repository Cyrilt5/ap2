<?php   
require ("requete.php");
$pdo=connexion();
$stmt=userexist($pdo);

$data = $stmt->fetchall();
if ( count($data) == 1) {//vérifie si l'utilisateur existe dans la base de donnée 
    session_start();
    $row = $data[0];
    $_SESSION['user'] = $row['user'];
    $_SESSION['id'] = $row['id'];
 header('Location: page_utilisateur.php');

}else {
    header('location: page_connexion.php');
 }