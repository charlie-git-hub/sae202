<?php
$nom = $_GET['nom'];

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
        echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../gestion_map.php";}, 3000);}</script>';
} else {
    echo "echec";
        echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../gestion_map.php";}, 3000);}</script>';
} 
?>
