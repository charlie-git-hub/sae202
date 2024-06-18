<?php
session_start();
if (file_exists('base.php')) {
    require('../base.php'); // inclure le fichier secret.php s'il existe dans le répertoire actuel
} else {
    require('../base.php'); // inclure le fichier secret.php dans le répertoire parent s'il n'existe pas dans le répertoire actuel
}

$affichage_erreur="";
$affichage_retour="";
$errors=0;
$note = $_POST['note'];

if (isset($_SESSION['id'])){
    $id_compte = $_SESSION['id'];
} else {
    $affichage_erreur .= "Vous devez être connecté pour pouvoir émettre un vote.</br>";
    $errors++;
}

if(!empty($note)){
$note = $_POST['note'];
} else {
    $affichage_erreur .= "Votre note ne peut être inférieur à 1 étoile.";
    $errors++;
}

$id_jardins = $_POST['id_jardins'];
$date = date("Y_m_d");

if($errors==0){
    $req_verification = $mabd->prepare("SELECT COUNT(*) AS count FROM `notes` WHERE `_id_jardins` = :id_produits AND `_id_compte` = :id_compte");
    $req_verification->bindParam(':id_produits', $id_jardins);
    $req_verification->bindParam(':id_compte', $id_compte);
    $req_verification->execute();
    $result_verification = $req_verification->fetch(PDO::FETCH_ASSOC);

    if ($result_verification['count'] == 0) {
        $req = "INSERT INTO `notes` (`ajout_notes`, date_avis, `_id_jardins`, `_id_compte`) VALUES ($note,'$date',$id_jardins, $id_compte)";
        $resultat = $mabd->query($req);
        $affichage_retour = "<div class='reserv-par-3'>Votre vote a été enregistré avec succès.</div>";
    } else {
        $affichage_retour = "<div class='reserv-par-3'>Vous avez déjà voté pour ce produit.</div>";
    }
}

$_SESSION['affichage_note']=$affichage_retour;
header('location: ../jardin/jardin.php?id='. $id_jardins);
?>