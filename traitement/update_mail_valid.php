<?php
session_start();
require('../base.php');

$id = $_POST['id'];
$former_mail = $_POST['former_mail'];
$new_mail = $_POST['new_mail'];
$mail_compte = $_POST['recup_mail'];

$errors=0;
$affichage_retour="";
$affichage_erreur="";

if (isset($_POST['boutton_mail'])) {
    if(!isset($_POST['former_mail']) || !isset($_POST['new_mail'])) {
        $affichage_erreur .='Les champs doivent être remplis obligatoirement.<br>';
        $errors++;
    } elseif ($_POST['former_mail'] != $_POST['recup_mail']){
        $affichage_erreur .="L'ancien mail ne correspond pas.<br>";
        $errors++;
    } else {
        $req = "UPDATE compte SET `mail_compte` = '$new_mail' WHERE `id_compte`='$id'";
        $resultat = $mabd->query($req);
    }
}

if ($errors == 1) {
    $affichage_retour='<div class="erreur-mdp">';
    $affichage_retour.="<p>Voici l'erreur lors de la modification de votre mail:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} elseif ($errors > 1) {
    $affichage_retour='<div class="erreur-mdp">';
    $affichage_retour.="<p>Voici les erreurs lors de la modification de votre mail:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} else {
    $affichage_retour='<div class="valid-mdp">';
    $affichage_retour.='<p>Votre email a bien été modifié !</p>';
    $affichage_retour.='</div>';
}

$_SESSION['update_mail']=$affichage_retour;
header('location: update_mail.php');

?>