<?php
session_start();
require('../base.php');

$id = $_POST['id'];
$former_nom= $_POST['former_nom'];
$new_nom = $_POST['new_nom'];
$nom_compte = $_POST['recup_nom'];

$errors=0;
$affichage_retour="";
$affichage_erreur="";

if (isset($_POST['boutton_nom'])) {
    if(!isset($_POST['former_nom']) || !isset($_POST['new_nom'])) {
        $affichage_erreur .='Les champs doivent être remplis obligatoirement.<br>';
        $errors++;
    } elseif ($_POST['former_nom'] != $_POST['recup_nom']){
        $affichage_erreur .="L'ancien nom d'utilisateur ne correspond pas.<br>";
        $errors++;
    } else {
        $req = "UPDATE compte SET `prénom_compte` = '$new_nom' WHERE `id_compte`='$id'";
        $resultat = $mabd->query($req);
    }
}

if ($errors == 1) {
    $affichage_retour='<div class="erreur-mdp">';
    $affichage_retour.="<p>Voici l'erreur lors de la modification de votre nom d'utilisateur:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} elseif ($errors > 1) {
    $affichage_retour='<div class="erreur-mdp">';
    $affichage_retour.="<p>Voici les erreurs lors de la modification de votre nom d'utilisateur:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} else {
    $affichage_retour='<div class="valid-mdp">';
    $affichage_retour.='<p>Votre nom d\'utilisateur a bien été modifié !</p>';
    $affichage_retour.='</div>';
}

$_SESSION['update_nom']=$affichage_retour;
$_SESSION['prénom']=$new_nom;
header('location: update_nom.php');

?>