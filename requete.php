<?php


/*************************CONNEXION A LA BDD*************************************** */
function connexion(){
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $host = '127.0.0.1';
    $db   = 'ap2';
    $user = 'root';
    $pass = 'Azerty123$';
    $dsn = "mysql:host=$host;dbname=$db";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } 
    catch (\PDOException $e) {
        print"ERREUR:".$e;
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}
/*************************FIN*********************************************/

/************************EXECUTION DE LA REQUETE********************** 
*/
$pdo=connexion();
function userexist($pdo){
    $stmt = $pdo->prepare("
        SELECT login, mdp
        FROM user
        WHERE login= ? and mdp= ? "
    );
    $stmt->execute(array($_POST['user'], $_POST['password']));
return $stmt;
}

function insert_user($pdo,$heures, $date, $idprio, $iduser){
    $stmt = $pdo->prepare("INSERT INTO `reservation`( `date`,`heure`, `id_salle`, `iduser`) VALUES (?,?,?,?)");
    $stmt->execute(array($date,$heures, $id_salle, $iduser));
    return $stmt;
 }

 function recherche_salle($pdo,$etat,$prio){
    $stmt=$pdo->prepare("SELECT s.nom_salle FROM `resservation` r INNER JOIN salle s ON s.id_salle = r.id_salle WHERE r.`dates`=?AND r.`heure`=?;");
    $stmt->execute(array($date,$heures));
    return $stmt;
 }

 function demande_a_faire($pdo){
    $stmt=$pdo->prepare("SELECT * FROM `resservation`");
    $stmt->execute();
    return $stmt;
 }

 function num_demande($pdo){
    $stmt=$pdo->prepare("SELECT numdemande FROM `demande`");
    $stmt->execute();
    return $stmt;
 }

 function update_demande($pdo,$idetat,$numdemande){
    $stmt=$pdo->prepare("UPDATE `demande` SET idetat= ? WHERE numdemande= ? ");
    $stmt->execute(array($idetat,$numdemande));
    return $stmt;
 }

 function update_demande_res($pdo,$idpriorite,$idetat,$numdemande){
    $stmt=$pdo->prepare("UPDATE `demande` SET idpriorite= ? idetat= ? WHERE numdemande= ? ");
    $stmt->execute(array($idpriorite,$idetat,$numdemande));
    return $stmt;
 }

 function salle_dispo($pdo,$dates,$heures){
    $stmt=$pdo->prepare("SELECT s.nom_salle 
                        FROM salle s 
                        WHERE s.id_salle NOT IN (
                            SELECT r.id_salle 
                            FROM resservation r 
                            WHERE r.dates =? AND r.heure = ?
                        )");
    $stmt->execute(array($dates,$heures));
    return $stmt;
 }