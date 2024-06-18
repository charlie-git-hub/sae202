<?php
session_start();
?>
<?php
$titre="Validation de la modification";
require('../base.php');
?>
<a href="tableparcelles_update_form.php">Retour</a><br>
<?php
$num = $_POST['num'];
$erreurs = 0;
$affichage_erreur = "";

if (!empty($_POST['reservation']) && ($_POST['reservation']) <= 2 && ($_POST['reservation']) >= 0) {
    $reservation = $_POST['reservation'];
} else {
    $affichage_erreur .= "Le status de la réservation ne peut être vide et doit être compris entre 0 et 2.</br>";
    $erreurs++;
}

if (!empty($_POST['date_debut'])) {
    $date_debut = $_POST['date_debut'];
} else {
    $affichage_erreur .= "La date du début de la réservation ne peut être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['date_fin'])) {
    $date_fin = $_POST['date_fin'];
} else {
    $affichage_erreur .= "La date de fin de la réservation ne peut être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['id_compte'])) {
    $id_compte = $_POST['id_compte'];
} else {
    $affichage_erreur .= "Le compte qui effectue la réservation ne peut être vide.</br>";
    $erreurs++;
}

if (isset($_POST['boutton_parcelles']) && $erreurs == 0) {
        $req = "UPDATE parcelles SET `reservation_parcelles` = $reservation, `date_debut_parcelles` = '$date_debut', `date_fin_parcelles` = '$date_fin', `_id_compte` = $id_compte WHERE id_parcelles = $num;";
    $resultat = $mabd->query($req);
    echo "<h1 class='valide'>Vous venez de modifier une parcelle ! <a href='tableParcelles_gestion.php'>Clique ici pour voir !</a></h1>";
} else {
    echo "Le formulaire n'a pas été correctement remplie voici les erreurs rencontrés : $affichage_erreur";
}

?>
