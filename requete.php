<?php


/*************************CONNEXION A LA BDD*************************************** */
function connexion(){
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $host = '127.0.0.1';
    $db   = 'ap2';
    $user = 'root';
    $pass = 'root';
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
        SELECT login, mdp,id_user
        FROM user
        WHERE login= ? and mdp= ? "
    );
    $stmt->execute(array($_POST['user'], $_POST['password']));
return $stmt;
}

function insert_reservation($pdo,$heures, $date, $id_salle, $iduser){
    $stmt = $pdo->prepare("INSERT INTO `resservation` ( `dates`, `heure`, `id_salle`, `id_user`) VALUES (?, ?, ?, ?)");
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
 function salle($pdo){
    $stmt=$pdo->prepare("SELECT r.`dates`,r.heure,s.nom_salle,u.login FROM `resservation` r INNER JOIN salle s on s.id_salle = r.id_salle INNER JOIN user u on u.id_user= r.id_user");
    $stmt->execute();
    return $stmt;
 }

 function salle_dispo($pdo,$dates,$heures){
    $stmt=$pdo->prepare("SELECT s.nom_salle,s.id_salle
                        FROM salle s 
                        WHERE s.id_salle NOT IN (
                            SELECT r.id_salle 
                            FROM resservation r 
                            WHERE r.dates =? AND r.heure = ?
                        )");
    $stmt->execute(array($dates,$heures));
    return $stmt;
 }
 function salle_proposer($pdo){
   $stmt=$pdo->prepare("SELECT s.nom_salle,s.id_salle
                       FROM salle s ");
   $stmt->execute();
   return $stmt;
}
 function reservation($pdo,$id_salle){
    $stmt=$pdo->prepare("SELECT r.`dates`,r.`heure`,s.`nom_salle`,u.`login`,r.`id_salle`
                         FROM `resservation` r 
                         INNER JOIN `user` u 
                         ON u.id_user=r.id_user                        
                         INNER JOIN `salle` s
                         ON s.id_salle=r.id_salle 
                         WHERE r.id_salle= ?");
    $stmt->execute(array($id_salle));
    return $stmt;
 }
 function cestlapurge($pdo,$date,$id_user){
   $stmt=$pdo->prepare("DELETE FROM `resservation` WHERE `dates`<? AND id_user=?");
   $stmt->execute(array($date,$id_user));
   return $stmt;
 }

 function type_salle($pdo){
   $stmt=$pdo->prepare("SELECT id_type,nom_type
                       FROM type_salle ");
   $stmt->execute();
   return $stmt;
}
function creation_salle($pdo,$nom_salle,$type_salle){
   $stmt=$pdo->prepare("INSERT INTO `salle`( `nom_salle`, `id_type`) VALUES (?,?)");
   $stmt->execute(array($nom_salle,$type_salle));
   return $stmt;
}
function delete_salle($pdo,$id_salle){
   $stmt=$pdo->prepare("DELETE FROM `salle` WHERE `id_salle`=?");
   $stmt->execute(array($id_salle));
   return $stmt;
 }
 function update_salle($pdo,$nom_salle,$type_salle,$id_salle){
   $stmt=$pdo->prepare("UPDATE `salle` SET `nom_salle`= ?,`id_type`= ? WHERE `id_salle`= ?");
   $stmt->execute(array($nom_salle,$type_salle,$id_salle));
   return $stmt;
 }