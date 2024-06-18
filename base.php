<?php
$secret='secret.php';
$i=0;
while (!file_exists($secret)) {
    if($i>10) {
        echo 'Impossible de trouver les fichiers de traitement chat';
        exit;
    }
     
    $secret='../'.$secret;
    $i++;
}
require("$secret");

$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;', USER, PASSWORD);
$mabd->query('SET NAMES utf8;');
?>