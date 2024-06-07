<?php
session_start();
include 'base.php';

if (!isset($_SESSION['id'])) {
    header('Location: compte.php');
    exit;
}

$affichage_erreurs = "";
$affichage_retour = "";
$erreurs = 0;

if (empty($_POST['id_jardin']) || empty($_POST['debut_emprunt']) || empty($_POST['fin_emprunt'])) {
    $affichage_erreurs .= "Tous les champs doivent être renseignés !";
    $erreurs++;
} else {
    $id_jardin = $_POST['id_jardin'];
    $user_id = $_SESSION['id'];
    $debut = $_POST['debut_emprunt'];
    $fin = $_POST['fin_emprunt'];
}

$debut_dt = DateTime::createFromFormat('Y-m-d', $debut);
$fin_dt = DateTime::createFromFormat('Y-m-d', $fin);

if (!$debut_dt || !$fin_dt || $debut_dt->format('Y-m-d') !== $debut || $fin_dt->format('Y-m-d') !== $fin) {
    $affichage_erreurs .= "Les dates doivent être au format AAAA-MM-JJ !<br>";
    $erreurs++;
}

if (isset($_POST['selected_parcelles']) && isset($user_id) && $erreurs == 0) {
    $selected_parcelles = explode(',', $_POST['selected_parcelles']);
    $debut_str = $debut_dt->format('Y-m-d');
    $fin_str = $fin_dt->format('Y-m-d');

    $req = $mabd->prepare("UPDATE parcelles SET reservation_parcelles = 1, _id_compte = :user_id, date_debut_parcelles = :debut, date_fin_parcelles = :fin WHERE id_parcelles = :id_parcelles");

    foreach ($selected_parcelles as $id_parcelle) {
        $req->execute([
            ':user_id' => $user_id,
            ':debut' => $debut_str,
            ':fin' => $fin_str,
            ':id_parcelles' => $id_parcelle
        ]);
    }
}

    if ($erreurs > 0) {
        $affichage_retour = $affichage_erreurs;
        $_SESSION['affichage_reservation'] = 
            ['message' => $affichage_erreurs];
            header('location: réservation.php?id_jardin='.$id_jardin);
    } else {
        if(!empty($_POST['selected_parcelles'])) {
            $_SESSION['affichage_reservation'] = 
                ['message' => "Les parcelles sélectionnées sont désormais réservées."];
            header('location: réservation.php?id_jardin='.$id_jardin);
        } else {
            $_SESSION['affichage_reservation'] = 
                ['message' => "Aucune parcelle sélectionnée."];
            header('location: réservation.php?id_jardin='.$id_jardin);
        }
    }
?>
