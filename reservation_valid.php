<?php
require('base.php');

$nom = $_POST['nom'];
$id_parcelles = $_POST['id_parcelles'];

$req1 = $mabd->prepare('SELECT id_compte FROM compte WHERE prénom_compte = "'.$nom.'";');
$req1->execute();
$compte = $req1->fetch(PDO::FETCH_ASSOC);

$id = $compte['id_compte'];

$req2 = $mabd->prepare('UPDATE parcelles SET reservation_parcelles = 2, _id_compte = ' . $id . ' WHERE id_parcelles = ' . $id_parcelles);
$req2->execute();

header('location: paramètre.php');