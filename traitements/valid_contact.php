<?php
session_start();
$_SESSION['information'] = '';

if (count($_POST) == 0) {
    header('location: ../form_contact.php');
}

$affichage_retour = '';
$erreurs = 0;

if (!empty($_POST['nom'])) {
    $nom = $_POST['nom'];
} else {
    $affichage_retour .= 'Le champ NOM est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $affichage_retour .= 'Adresse mail incorrecte<br>';
        $erreurs++;
    }
} else {
    $affichage_retour .= 'Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

if ($erreurs != 0) {
    $_SESSION['information'] = $affichage_retour;
    header('location: ../form_contact.php'); 
}

$prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : ''; 
$message = !empty($_POST['message']) ? $_POST['message'] : ''; 

echo 'Votre nom : ' . htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) . '<br>';
echo 'Adresse mail : ' . htmlspecialchars($email) . '<br>';
echo 'Message : ' . htmlspecialchars($message) . '<br>';

$prenom = mb_strtolower($prenom);
$nom = mb_strtolower($nom);

$subject = 'Potajou : demande de ' . $prenom . ' ' . $nom;
$headers = [
    'From' => $email,
    'Reply-to' => $email,
    'X-Mailer' => 'PHP/' . phpversion()
];
$email_dest = "mmi23c09@mmi-troyes.fr";

if (mail($email_dest, $subject, $message, $headers)) {
    $affichage_retour = 'Mail de Contact OK';
} else {
    $affichage_retour = 'Erreur d\'envoi du mail de contact';
}

$_SESSION['information'] = $affichage_retour;
header('location: ../form_contact.php'); 
exit();
?>
<main>
<?php
if ($erreurs == 0) {
    echo '<div id="reussite">' . "\n";
    echo '<p>' . htmlspecialchars($_SESSION['information']) . '</p>' . "\n";
    echo '<form action="../index.php">' . "\n";
    echo '<button type="submit">Retour</button>' . "\n";
    echo '</form>' . "\n";
    echo '</div>' . "\n";
} else {
    echo '<div id="echec">' . "\n";
    echo '<p>' . htmlspecialchars($_SESSION['information']) . '</p>' . "\n";
    echo '<form action="../form_contact.php">' . "\n";
    echo '<button type="submit">Retour</button>' . "\n";
    echo '</form>' . "\n";
    echo '</div>' . "\n";
}
?>
</main>
