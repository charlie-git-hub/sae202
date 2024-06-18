<?php
require('../base.php');

$id = $_POST['id'];
$id_jardins = $_POST['id_jardins'];

$req1 = $mabd->prepare('DELETE FROM jardins WHERE id_jardins = '.$id_jardins.' AND _id_compte = '.$id);
$req1->execute();
$compte = $req1->fetch(PDO::FETCH_ASSOC);

header('location: ../user/dashboard.php');