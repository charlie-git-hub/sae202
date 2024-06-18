<?php
session_start();
?>

<?php
$titre="Validation de la modification";
require('../base.php');
?>
<link rel="stylesheet" href="../style5.css">
<a href="tableCompte_gestion.php" class="gestion">Retour</a><br>

<?php
$num =$_POST['num'];
$erreurs = 0;
$affichage_erreur = "";

$req = "SELECT img_compte FROM compte WHERE `id_compte`=$num";
$resultat = $mabd->query($req);
$pdp = $resultat->fetch();

if($_FILES["photo"]["name"]!=""){
    $imageType=$_FILES["photo"]["type"];
    if ( ($imageType != "image/wbep") &&
        ($imageType != "image/jpg") &&
        ($imageType != "image/jpeg") ) {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats WEBP et JPEG sont autorisés.</p>'."\n";
            die();
    }
    
    //creation d'un nouveau nom pour cette image téléchargée
    // pour éviter d'avoir 2 fichiers avec le même nom
    $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
    
    // dépot du fichier téléchargé dans le dossier /var/www/r214/images/uploads
    if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads_pdp/".$nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
}

if (!empty($_POST['nom']) && strlen($_POST['nom']) >= 6) {
    $nom = $_POST['nom'];
} else {
    $affichage_erreur .= "Le nom d'utilisateur ne peut être vide ou inférieur à 6 caractères.</br>";
    $erreurs++;
}

if (!empty($_POST['mail'])) {
    // Si le champ email contient des données
    // Verification du format de l'email
    if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
    $mail=$_POST['mail'];
    } else {
    // Si l'email est incorrect on retourne au formulaire  
    $affichage_erreur .='Le champ "Adresse mail" doit contenir un @ et avoir une extension valide (@gmail.com/ @orange.fr/ etc...).</br>';
    $erreurs++;
    }
} else {
    $affichage_erreur .="L'adresse email ne peut être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['nom']) && strlen($_POST['nom']) >= 6) {
    $nom = $_POST['nom'];
} else {
    $affichage_erreur .= "Le nom d'utilisateur ne peut être vide ou inférieur à 6 caractères.<br>";
    $erreurs++;
}

if (!empty($_POST['mdp'])) {
    $mdp=$_POST['mdp'];
    if (strlen($mdp) < 8) {
        $affichage_erreur .="Le mot de passe doit comporter au moins 8 caractères.</br>";
        $erreurs++;
    }
    // Vérification de la complexité du mot de passe
    if (!preg_match("#[0-9]+#", $mdp) || !preg_match("#[a-zA-Z]+#", $mdp)) {
        $affichage_erreur .= "Le mot de passe doit contenir au moins un chiffre et une lettre.</br>";
        $erreurs++;
    }
} else {
    $affichage_erreur .='Il est obligatoire de préciser votre mot de passe</br>';
    $erreurs++;
}

$mdphache=password_hash($mdp, PASSWORD_DEFAULT);


// Vérifiez si $numauteur est défini avant de l'utiliser dans la requête
if (isset($_POST['boutton_compte']) && $erreurs == 0) {
    if (!empty($nouvelleImage)) {
        $req = "UPDATE compte SET `img_compte` = '$nouvelleImage', `prénom_compte` = '$nom', `mail_compte` = '$mail', `mdp_compte` = '$mdphache' WHERE id_compte = $num;";
    } else {
        $req = "UPDATE compte SET `prénom_compte` = '$nom', `mail_compte` = '$mail', `mdp_compte` = '$mdphache' WHERE id_compte = $num;";
    }
    $resultat = $mabd->query($req);
    echo "<h1 class='valide'>Vous venez de modifier un compte ! <a href='tableCompte_gestion.php'>Clique ici pour voir !</a></h1>";
} else {
    echo "Le formulaire n'a pas été correctement remplie voici les erreurs rencontrés : $affichage_erreur";
}

?>
