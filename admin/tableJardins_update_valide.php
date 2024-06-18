<?php
session_start();
?>
<?php
$titre="Validation de la modification";;
require('../base.php');
?>
<a href="tableJardins_update_form.php">Retour</a><br>
<?php
$num = $_POST['num'];
$erreurs = 0;
$affichage_erreur = "";

function validateAddress($adresse) {

    $addressEncoded = urlencode($adresse);

    $apiUrl = "https://api-adresse.data.gouv.fr/search/?q=$addressEncoded";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); 

    $response = curl_exec($ch);

    if ($response === false) {
        $errorMessage = curl_error($ch);
        curl_close($ch);
        return ["valid" => false, "message" => "Erreur lors de la requête à l'API. URL: $apiUrl, Erreur: $errorMessage"];
    }
    
    $data = json_decode($response, true);
    curl_close($ch);
    
    if (isset($data['features']) && count($data['features']) > 0) {
        foreach ($data['features'] as $feature) {
            if (isset($feature['properties']['label']) && $feature['properties']['label'] == $adresse) {
                return ["valid" => true, "message" => "L'adresse est valide.", "data" => $data];
            }
        }
        return ["valid" => false, "message" => "Aucune adresse exacte trouvée."];
    } else {
        return ["valid" => false, "message" => "Aucune adresse valide trouvée. Réponse: " . print_r($data, true)];
    }
}

if (!empty($_POST['nom']) && strlen($_POST['nom']) >= 6) {
    $nom = $_POST['nom'];
} else {
    $affichage_erreur .= "Le nom du jardin ne peut être vide ou inférieur à 6 caractères.</br>";
    $erreurs++;
}

if(isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
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
        if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads_jardins/".$nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
}

if(empty($_POST['adresse'])) {
    $affichage_erreur .= "L'adresse du jardin est obligatoire.</br>";
    $erreurs++;
} else {
    $adresse = $_POST['adresse'];
    $validationResult = validateAddress($adresse);
    if (!$validationResult['valid']) {
        $affichage_erreur .= $validationResult['message'] . "</br>";
        $erreurs++;
    } else {
    }
}

if (!empty($_POST['gps'])) {
    $gps = $_POST['gps'];
} else {
    $affichage_erreur .= "Les coordonnées du jardin ne peuvent être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['taille']) && ($_POST['taille']) > 25) {
    $taille = $_POST['taille'];
} else {
    $affichage_erreur .= "La taille du jardin ne peut être vide ou inférieur à 25m².</br>";
    $erreurs++;
}

if (!empty($_POST['proprietaire'])) {
    $proprietaire = $_POST['proprietaire'];
} else {
    $affichage_erreur .= "L'acteur du jardin ne peut être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['résumé']) && strlen($_POST['résumé']) >= 50 ) {
    $résumé = $_POST['résumé'];
} else {
    $affichage_erreur .= "La description du jardin ne peut être vide ou inférieur à 50 caractères.</br>";
    $erreurs++;
}

if (!empty($_POST['contenu'])) {
    $contenu = $_POST['contenu'];
} else {
    $affichage_erreur .= "Le contenu du jardin ne peut être vide.</br>";
    $erreurs++;
}

if (!empty($_POST['id_compte'])) {
    $id_compte = $_POST['id_compte'];
} else {
    $affichage_erreur .= "Le propriétaire du jardin ne peut être vide.</br>";
    $erreurs++;
}

// Vérifiez si $numauteur est défini avant de l'utiliser dans la requête
if (isset($_POST['boutton_jardins']) && $erreurs == 0) {
    if (!empty($nouvelleImage)) {
        $req = "UPDATE jardins SET `nom_jardins` = '$nom', `img_jardins` = '$nouvelleImage', `adresse_jardins` = '$adresse', `maps_jardins` = '$gps', `taille_jardins` = $taille, `acteur_jardins` = '$proprietaire', `résumé_jardins` = '$résumé', `contenu_jardins` = '$contenu', `_id_compte` = $id_compte WHERE id_jardins = $num;";
    } else {
        $req = "UPDATE jardins SET `nom_jardins` = '$nom', `adresse_jardins` = '$adresse', `maps_jardins` = '$gps', `taille_jardins` = $taille, `acteur_jardins` = '$proprietaire', `résumé_jardins` = '$résumé', `contenu_jardins` = '$contenu', `_id_compte` = $id_compte WHERE id_jardins = $num;";
    }
    $resultat = $mabd->query($req);
    echo "<h1 class='valide'>Vous venez de modifier un jardin ! <a href='tableJardins_gestion.php'>Clique ici pour voir !</a></h1>";
} else {
    echo "Le formulaire n'a pas été correctement remplie voici les erreurs rencontrés : $affichage_erreur";
}

?>
