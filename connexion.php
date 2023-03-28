<?php   
require ("requete.php");
$pdo=connexion();
$stmt=userexist($pdo);

$data = $stmt->fetchall();
if ( count($data) == 1) {//vérifie si l'utilisateur existe dans la base de donnée 
    session_start();
    $row = $data[0];
    $_SESSION['login'] = $row['login'];
    $_SESSION['id_user'] = $row['id_user'];
    header('Location: page_utilisateur.php');

}else {
    header('location: page_connexion.php');
 }