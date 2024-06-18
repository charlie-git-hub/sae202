<link rel="stylesheet" href="../style5.css">
<?php
session_start();
$titre = "Validation de l'ajout";
require('../base.php');
$_SESSION['enregistrement'] = '';

if (count($_POST) == 0) {
    // Si le tableau est vide, on affiche le formulaire
    header('location: tableCompte_new_form.php');
}
$errors = 0;
$affichage_erreur = "";
if ($errors == 0) {

    if (isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
        // Vérification du format de l'image téléchargée
        $imageType = $_FILES["photo"]["type"];
        if (($imageType != "image/png") &&
            ($imageType != "image/jpg") &&
            ($imageType != "image/jpeg")) {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu !</br>';
            echo 'Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
            die();
        }

        // Création d'un nouveau nom pour cette image téléchargée
        // pour éviter d'avoir 2 fichiers avec le même nom
        $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

        // Dépôt du fichier téléchargé dans le dossier /var/www/sae203/images
        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            if (!move_uploaded_file($_FILES["photo"]["tmp_name"],
                "../images/uploads_pdp/" . $nouvelleImage)) {
                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
                die();
            }
        } else {
            echo '<p>Problème : image non chargée...</p>' . "\n";
            die();
        }
    }

    // Récupération des données du formulaire
    if (!empty($_POST['nom'])) {
        $nom = ucfirst(strtolower($_POST['nom']));
    } else {
        $affichage_erreur .= 'Le champ "nom d\'utilisateur" est obligatoire<br>';
        $errors++;
    }
    if (!empty($_POST['mail'])) {
        // Si le champ email contient des données
        // Vérification du format de l'email
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = $_POST['mail'];
        } else {
            // Si l'email est incorrect on retourne au formulaire  
            $affichage_erreur .= 'Le champ "Adresse mail" doit contenir un @ et avoir une extension valide (@gmail.com/ @orange.fr/ etc...).<br>';
            $errors++;
        }
        // Si le champ email est vide, on retourne au formulaire     
    } else {
        $affichage_erreur .= 'Le champ "Adresse mail" est obligatoire<br>';
        $errors++;
    }
    if (!empty($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
        if (strlen($mdp) < 8) {
            $affichage_erreur .= "Le mot de passe doit comporter au moins 8 caractères.";
            $errors++;
        }
        // Vérification de la complexité du mot de passe
        if (!preg_match("#[0-9]+#", $mdp) || !preg_match("#[a-zA-Z]+#", $mdp)) {
            $affichage_erreur .= "Le mot de passe doit contenir au moins un chiffre et une lettre.";
            $errors++;
        }
    } else {
        $affichage_erreur .= 'Il est obligatoire de préciser votre mot de passe<br>';
        $errors++;
    }

    $affichage_retour = '<div class="reponseV">';
    $affichage_retour .= '<p class="valide">Votre compte a bien été créé ! <a href="tableCompte_gestion.php">Clique ici pour voir !</a></p>';
    $affichage_retour .= '</div>';

    if ($errors == 1) {
        $affichage_retour = '<div class="reponseF">';
        $affichage_retour .= "<p class='valide'>Voici l'erreur lors de la création de votre compte:<br> $affichage_erreur</p>";
        $affichage_retour .= '</div>';
    }
    if ($errors > 1) {
        $affichage_retour = '<div class="reponseF">';
        $affichage_retour .= "<p class='valide'>Voici les erreurs lors de la création de votre compte:<br> $affichage_erreur</p>";
        $affichage_retour .= '</div>';
    }
}

$mdphache = password_hash($mdp, PASSWORD_DEFAULT);

if ($errors == 0) {
    if (!isset($nouvelleImage)) {
        $req = $mabd->prepare("INSERT INTO compte (img_compte,`prénom_compte`, mail_compte, mdp_compte) VALUES (DEFAULT,'$nom', '$mail', '$mdphache')");
        $req->execute();
    } else {
        $req = $mabd->prepare("INSERT INTO compte (img_compte,`prénom_compte`, mail_compte, mdp_compte) VALUES (:photo,:nom, :mail, :mdp)");
        $req->bindParam(':photo', $nouvelleImage);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':mail', $mail);
        $req->bindParam(':mdp', $mdphache);
        $req->execute();
    }
}   
echo $affichage_retour;
?>
