<?php
session_start();
require('../base.php');

$id = $_POST['id'];
$former_mdp = $_POST['former_mdp'];
$new_mdp = $_POST['new_mdp'];

$req = "SELECT * FROM compte WHERE `id_compte`=$id";
$resultat = $mabd->query($req);
$compte = $resultat->fetch();

$errors=0;
$affichage_retour="";
$affichage_erreur="";

if (isset($_POST['boutton_mdp'])) {
    if(empty($former_mdp) || empty($new_mdp)) {
        $affichage_erreur .='Les champs doivent être remplis obligatoirement.<br>';
        $errors++;
    } elseif (!password_verify($former_mdp, $compte['mdp_compte'])) {
        $affichage_erreur .= "L'ancien mot de passe ne correspond pas.<br>";
        $errors++;
    } elseif (!preg_match("#[0-9]+#", $new_mdp) || !preg_match("#[a-zA-Z]+#", $new_mdp) || strlen($tempmdp) >= 8) {
        $affichage_erreur .= "Le mot de passe doit contenir au moins un chiffre, une lettre et d'un total de 8 caractères minimum.";
        $errors++;
    } else {
        $new_mdp_hashed = password_hash($new_mdp, PASSWORD_DEFAULT);
        $req = "UPDATE compte SET `mdp_compte` = '$new_mdp_hashed' WHERE `id_compte`='$id'";
        $resultat = $mabd->query($req);
    }
}

if ($errors == 1) {
    $affichage_retour='<div class="">';
    $affichage_retour.="<p>Voici l'erreur lors de la  modification de votre mot de passe:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} elseif ($errors > 1) {
    $affichage_retour='<div class="">';
    $affichage_retour.="<p>Voici les erreurs lors de la modification de votre mot de passe:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} else {
    $affichage_retour='<div class="">';
    $affichage_retour.='<p>Votre mot de passe a bien été modifié !</p>';
    $affichage_retour.='</div>';
}

$_SESSION['update_mdp']=$affichage_retour;
header('location: ../user/dashboard.php');

?>