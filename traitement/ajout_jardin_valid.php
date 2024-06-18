<?php
session_start();
require("../base.php");
$affichage_erreur ="";
$affichage_retour ="";
$errors=0;

$id = $_POST['id'];

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

// Traitement des données du formulaire
if(empty($_POST['nom'])) {
    $affichage_erreur .= "Le nom du jardin est obligatoire.</br>";
    $errors++;
} else {
    $nom = $_POST['nom'];
}

if(empty($_POST['adresse'])) {
    $affichage_erreur .= "L'adresse du jardin est obligatoire.</br>";
    $errors++;
} else {
    $adresse = $_POST['adresse'];
    $validationResult = validateAddress($adresse);
    if (!$validationResult['valid']) {
        $affichage_erreur .= $validationResult['message'] . "</br>";
        $errors++;
    } else {
    }
}

if(empty($_POST['gps'])) {
    $affichage_erreur .= "Les coordonnées gps du jardin ne sont pas valables.</br>";
    $errors++;
} else {
    $gps = $_POST['gps'];
}

// Gestion de l'image
if(isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
    $imageType=$_FILES["photo"]["type"];
    if ( ($imageType != "image/png") &&
         ($imageType != "image/webp") &&
         ($imageType != "image/jpg") &&
         ($imageType != "image/jpeg") ) {
        $affichage_erreur .= 'Seuls les formats PNG, JPEG et WEBP sont autorisés.</br>';
        $errors++;
    } else {
        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads_jardin/".$nouvelleImage)) {
                $affichage_erreur .= 'Problème avec la sauvegarde de l\'image.</br>';
                $errors++;
            }
        } else {
            $affichage_erreur .= 'Problème : image non chargée.</br>';
            $errors++;
        }
    }
} else {
    $affichage_erreur .= "L'image descriptive du jardin est obligatoire.</br>";
    $errors++;
}

// Autres champs à vérifier (ajoutez ici d'autres vérifications si nécessaire)
if(empty($_POST['surface'])) {
    $affichage_erreur .= "La taille du jardin est obligatoire.</br>";
    $errors++;
} else {
    $taille = $_POST['surface'];
}

if(empty($_POST['acteur'])) {
    $affichage_erreur .= "L'acteur du jardin est obligatoire.</br>";
    $errors++;
} else {
    $acteur = $_POST['acteur'];
}

if(empty($_POST['resume'])) {
    $affichage_erreur .= "Le résumé du jardin est obligatoire.</br>";
    $errors++;
} else {
    $resume = $_POST['resume'];
}

if(empty($_POST['contenu'])) {
    $affichage_erreur .= "Le contenu du jardin est obligatoire.</br>";
    $errors++;
} else {
    $contenu = $_POST['contenu'];
}

$date = date("Y_m_d");

if ($errors == 0){
    $req = $mabd->prepare('INSERT INTO jardins (nom_jardins, img_jardins, adresse_jardins, maps_jardins, taille_jardins, acteur_jardins, résumé_jardins, contenu_jardins, _id_compte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $req->execute([$nom, $nouvelleImage, $adresse, $gps, $taille, $acteur, $resume, $contenu, $id]);
    
    $affichage_retour = '<div class="reponseV"><p class="valide">Votre jardin a bien été ajouté !</p></div>';
} else {
    $affichage_retour = '<div class="reponseF"><p class="valide">Voici les erreurs lors de l\'ajout de votre jardin:<br>' . $affichage_erreur . '</p></div>';
}

$_SESSION['ajout_jardin'] = $affichage_retour;
header('location: ../user/dashboard.php');
?>
