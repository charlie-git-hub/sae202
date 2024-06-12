<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
</head>
<body>
<?php
session_start();
?>
    <h2>Contactez-nous</h2>
    <form action="traitements/valid_contact.php" method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
    <?php
if (isset($_SESSION['information'])) {
echo '<p>'.$_SESSION['information'].'</p>'."\n";
session_unset();
}
?>
</body>
</html>
