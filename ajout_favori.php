<?php
session_start();
require('base.php');

$id_jardins = $_POST['id_jardins'];
$id_compte = $_POST['id'];
$provenance = $_POST['provenance'];

if(!isset($id_compte)){
header('location: compte.php');
} else {
$id_compte = $_SESSION['id'];
}

$req_verif = $mabd->prepare('SELECT COUNT(*) AS compte FROM favori WHERE `_id_compte` = '.$id_compte.' AND `_id_jardins` = '.$id_jardins.';');
$req_verif->execute();
$donnees_verif = $req_verif->fetch();

if ($donnees_verif['compte'] > 0) {
    $req_ajout = $mabd->prepare('DELETE FROM favori WHERE `_id_compte` = '.$id_compte.' AND `_id_jardins` = '.$id_jardins.';');
    $req_ajout->execute();
    $affichage_retour = "Le produit a bien été retiré de vos favoris.";
} else {
    $req_ajout = $mabd->prepare('INSERT INTO favori(`_id_compte`,`_id_jardins`) VALUES ('.$id_compte.','.$id_jardins.');');
    $req_ajout->execute();
    $affichage_retour = "Le produit a bien été ajouté à vos favoris.";
}

$_SESSION['affichage_favori'] = [
    'message' => $affichage_retour,
    'id_jardins' => $id_jardins
];

if($provenance == "produit.php") {
    $_SESSION['affichage_favori'] = [
        'message' => $affichage_retour,
        'id_jardins' => $id_jardins
    ];
header('location: ../produits/produit.php?id='.$id_jardins.'');
} else {
    header('location: ../admin/favori.php');
}
?>
