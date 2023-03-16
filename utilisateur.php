<?php
require("requete.php");
$pdo=connexion();
salle_dispo($pdo,$_POST['date'],$_POST['heure']);
