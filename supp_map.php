<?php
$p_nom = $_GET['p_nom'];

include('conf.inc.php');
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD)
;$mabd->query('SET NAMES utf8;');
$mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Use prepared statement to avoid SQL injection
$req = "DELETE FROM jardins WHERE nom = :nom";
$stmt = $mabd->prepare($req);
$stmt->bindParam(':nom', $nom);
$stmt->execute();

// Check if any rows were affected
if ($stmt->rowCount() > 0) {
    echo "suppression effectuée";
    exit;
} else {
    echo "echec";
    exit;
} 
?>
