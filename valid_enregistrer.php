<?php
session_start();
require('base.php');
$_SESSION['enregistrement']='';

if (count($_POST)==0) {
	// Si le le tableau est vide, on affiche le formulaire
	header('location: enregistrer.php');
}
$errors=0;
$affichage_retour="";
$affichage_erreur="";
if ($errors == 0) {

// Récupération des données du formulaire
if (!empty($_POST['nom'])) {
	$nom=ucfirst(strtolower($_POST['nom']));
} else {
    $affichage_erreur .='Le champ "nom d\'utilisateur" est obligatoire<br>';
    $errors++;
}
if (!empty($_POST['mail'])) {
    // Si le champ email contient des données
    // Verification du format de l'email
    if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
    $mail=$_POST['mail'];
    } else {
    // Si l'email est incorrect on retourne au formulaire  
    $affichage_erreur .='Le champ "Adresse mail" doit contenir un @ et avoir une extension valide (@gmail.com/ @orange.fr/ etc...).<br>';
    $errors++;
    }
    // Si le champ email est vide, on retourne au formulaire     
    } else {
    $affichage_erreur .='Le champ "Adresse mail" est obligatoire<br>';
    $errors++;
    }
if (!empty($_POST['mdp'])) {
        $tempmdp=$_POST['mdp'];
	if (strlen($tempmdp) < 8) {
        $affichage_erreur .="Le mot de passe doit comporter au moins 8 caractères.";
        $errors++;
    }
    // Vérification de la complexité du mot de passe
    if (!preg_match("#[0-9]+#", $tempmdp) || !preg_match("#[a-zA-Z]+#", $tempmdp)) {
        $affichage_erreur .= "Le mot de passe doit contenir au moins un chiffre et une lettre.";
        $errors++;
    }
    if (!empty($_POST['mdp2'])) {
        if ($_POST['mdp2'] == $tempmdp) {
            $mdp = $tempmdp;
        } else {
            $affichage_erreur .= "Vos mots de passe doivent être identiques";
            $errors++;
        }
    }
    } else {
        $affichage_erreur .='Il est obligatoire de préciser votre mot de passe<br>';
        $errors++;
}
if (!empty($_POST['utilisation'])) {
    $utilisation=$_POST['utilisation'];
} else {
    $affichage_erreur .='Il est obligatoire de renseigner votre principale utilisation du site<br>';
    $errors++;
}

    $affichage_retour='<div class="reponseV">';
    $affichage_retour.='<p class="valide">Votre compte a bien été créer, un email vous a été envoyé pour confirmer votre création.</p>';
    $affichage_retour.='</div>';

if ($errors == 1) {
    $affichage_retour='<div class="reponseF">';
    $affichage_retour.="<p class='valide'>Voici l'erreur lors de la création de votre compte:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
}
if ($errors > 1) {
    $affichage_retour='<div class="reponseF">';
    $affichage_retour.="<p class='valide'>Voici les erreurs lors de la création de votre compte:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
}
}

$mdphache=password_hash($mdp, PASSWORD_DEFAULT);

if($errors==0){
    $req = $mabd->prepare("INSERT INTO compte (`prénom_compte`, mail_compte, mdp_compte, utilisation_compte) VALUES (:nom, :mail, :mdp, :utilisation)");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':mail', $mail);
    $req->bindParam(':mdp', $mdphache);
    $req->bindParam(':utilisation', $utilisation);
    $req->execute();
}
$_SESSION['enregistrement']=$affichage_retour;
header('location: enregistrer.php');
?>