<?php
session_start();

if (empty($_POST)) {
    header('Location: ../form_contact.php');
    exit();
}

$affichage_retour = '';
$erreurs = 0;

if (empty($_POST['nom'])) {
    $affichage_retour .= 'Le champ NOM est obligatoire<br>';
    $erreurs++;
} else {
    $nom = $_POST['nom'];
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $affichage_retour .= 'Adresse e-mail incorrecte<br>';
    $erreurs++;
} else {
    $email = $_POST['email'];
}

if ($erreurs > 0) {
    $_SESSION['information'] = $affichage_retour;
    header('Location: ../form_contact.php');
    exit();
}

$prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : '';
$message = !empty($_POST['message']) ? $_POST['message'] : '';
$subject = 'Potajou : demande de ' . $prenom . ' ' . $nom;

$headers = [
    'From' => $email,
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion()
];

$email_dest = "mmi23c09@mmi-troyes.fr";

if (mail($email_dest, $subject, $message, $headers)) {
    $affichage_retour = 'Votre demande a bien été prise en compte. ';
} else {
    $affichage_retour = 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer plus tard.';
}
$subject = 'Confirmation, Potajou';

$headers = [
    'From' => "mmi23c09@mmi-troyes.fr",
    'Reply-To' => "mmi23c09@mmi-troyes.fr",
    'X-Mailer' => 'PHP/' . phpversion(),
   'MIME-Version' => '1.0',
   'Content-type' => 'text/html; charset=UTF-8'];

   $message = '  <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <img src="http://mmi23c09.mmi-troyes.fr/autres/image.webp" height="30px">
            <h2 style="color: #5E7F38; display: inline-block; vertical-align: bottom; margin: 0;">Bonjour !</h2>
            <p style="width: fit-content;">Votre demande a bien été reçue. <br>Nous la traiterons dans les plus brefs délais.</p>
        </div>
        <img src="http://mmi23c09.mmi-troyes.fr/autres/panier_image.png" style="height: 200px; margin-left: 20px;">';

$email_dest = $email;

if (mail($email_dest, $subject, $message, $headers)) {
    $affichage_retour = 'Un e-mail de confirmation vous a été envoyé.';
} else {
    $affichage_retour = 'Le mail de confirmation n\'a pas été envoyé. Veuillez réessayer plus tard.';
}
$_SESSION['information'] = $affichage_retour;
header('Location: ../form_contact.php');
exit();
?>
