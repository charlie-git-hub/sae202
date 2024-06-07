<?php
session_start();
require('base.php');

$index = 'index.php';
$i = 0;
while (!file_exists($index)) {
    if ($i > 10) {
        echo 'Impossible de trouver les fichiers de traitement chat';
        exit;
    }
    $index = '../' . $index;
    $i++;
}

$errors = 0;
$affichage_retour = "";
$affichage_erreur = "";

// Récupération des données du formulaire
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

$req = $mabd->query("SELECT * FROM compte WHERE mail_compte='" . $mail . "'");
$test = $req->fetchAll();
foreach ($test as $row){
    $verifmdphache=$row['mdp_compte'];
}

if (empty($_POST['mdp'])) {
    // Si le champ mot de passe est vide
    $affichage_erreur .= 'Il est obligatoire de préciser votre mot de passe<br>';
    $errors++;
} else {
    // Vérifiez si le mot de passe correspond bien à l'adresse mail"
    $tempmdp=$_POST['mdp'];
    if(!password_verify($tempmdp,$verifmdphache)) {
        $affichage_erreur .= "Votre mot de passe ne correspond pas<br>";
        $errors++;
    } else {
        $mdp=$tempmdp;
    }
}

foreach ($test as $row){
    $prénom=$row['prénom_compte'];
    $id=$row['id_compte'];
}

$affichage_retour = '<div class="reponseV">';
$affichage_retour .= "<p class='valide'>Connexion établie ! Veuillez retourner à l'<a href=\"$index\">accueil</a> si vous le souhaitez</p>";
$affichage_retour .= '</div>';

if ($errors == 1) {
    $affichage_retour = '<div class="reponseF">';
    $affichage_retour .= "<p class='valide'>Voici l'erreur lors de votre tentative de connexion:<br> $affichage_erreur</p>";
    $affichage_retour .= '</div>';
}
if ($errors > 1) {
    $affichage_retour = '<div class="reponseF">';
    $affichage_retour .= "<p class='valide'>Voici les erreurs lors de votre tentative de connexion:<br> $affichage_erreur</p>";
    $affichage_retour .= '</div>';
}

$_SESSION['connexion'] = $affichage_retour;
if($errors == 0){
$_SESSION['prénom'] = $prénom;
$_SESSION['id']= $id;
}
header('location: compte.php');
?>
