<?php
// Vérification de sélection d'un fichier
// Récupération des attributs du fichier (nom,type,taille)
if (!empty($_FILES) && isset($_FILES['image'])) {

    $image_nom = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_taille = $_FILES['image']['size'];
    $image_temporaire = $_FILES['image']['tmp_name'];
    $image_error = $_FILES['image']['error'];

    // Vérification temporaire - A supprimer à la fin de l'exercice
    echo 'Nom de l\'image : '.$image_nom.'<br>';
    echo 'Type de fichier : '.$image_type.'<br>';
    echo 'Taille du fichier : '.$image_taille.'<br>';
    echo 'Nom temporaire : '.$image_temporaire.'<br>';
    echo 'Code erreur : '.$image_error.'<br>';

    // Début Vérification de la conformité
    $affichage_erreurs = '';
    $erreurs = 0;

    // Test si pas d'erreur de sélection
    if ($image_error == 0) {
        // Test format du fichier en fonction de l'extension
        if ($image_type != 'image/svg+xml' && $image_type != 'image/svg') {
            $affichage_erreurs .= 'Le fichier n\'est pas au format SVG ou l\'extension est invalide<br>';
            $erreurs++;
        }

        // Test format du fichier avec la fonction exif_imagetype
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileInfo, $image_temporaire);
        finfo_close($fileInfo);

        if ($mimeType != 'image/svg+xml' && $mimeType != 'image/svg') {
            $affichage_erreurs .= 'Ce fichier n\'est pas une image SVG<br>';
            $erreurs++;
        }
    } else {
        $affichage_erreurs .= 'Impossible de télécharger le fichier, erreur de sélection<br>';
        $erreurs++;
    }

    // On affiche les erreurs
    if ($erreurs != 0) {
        echo $affichage_erreurs;
    } else {
        echo 'Fichier conforme<br>';

        // On récupère le nombre de fichiers dans images/galerie
        $nbFichiers = -2; // Le dossier contient deux fichiers cachés . et ..
        $dossier = opendir("../data/images/markers");
        while ($fichier = readdir($dossier)) {
            $nbFichiers++;
        }
        closedir($dossier);

        // On renomme le fichier - imageN.svg
        $image_num = $nbFichiers + 1;
        $image_nom = 'image'.$image_num.'.svg';
   
        // On fixe le nom complet de la destination (chemin relatif/imageN.svg)
        $destination = "../data/images/markers/".$image_nom;

        // On déplace le fichier dans son emplacement définitif
        if (move_uploaded_file($image_temporaire, $destination)) {
            echo 'Téléchargement terminé avec succès<br>';
        } else {
            echo 'Erreur de téléchargement<br>';
        }
    }
} else {
    echo 'Vous devez sélectionner un fichier';
}

$encodedImageNom = urlencode($image_nom);
header("Location: ../map.php?image_nom=" . $encodedImageNom);
exit();
