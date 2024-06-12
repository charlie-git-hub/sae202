<?php
require('conf.inc.php');

$id = $_POST['id'] ?? null;
$nom = $_POST['nom'] ?? null; 
$p_point1 = $_POST['p_point1'] ?? null;
$p_point2 = $_POST['p_point2'] ?? null;
$p_point3 = $_POST['p_point3'] ?? null;
$p_point4 = $_POST['p_point4'] ?? null;
$co_marker = $_POST['co_marker'] ?? null;
$marker = $_FILES['image'] ?? null; // Correction ici
$adresse = $_POST['adresse'] ?? null;
$acteur = $_POST['acteur'] ?? null;

try {
    $mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);    
    $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Définition de la table utilisée
    $table = 'jardins';

    // Récupération du nombre de lignes dans la table
    $sql = "SELECT COUNT(*) AS total_lignes FROM $table"; // Correction ici
    $requete = $mabd->prepare($sql);
    $requete->execute();
    
    $row = $requete->fetch(PDO::FETCH_ASSOC);
    $nombre_lignes = $row['total_lignes'];
    
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}

if(isset($_POST['auto_id'])){
    $id = $nombre_lignes + 1;
}
else{
    $id = $_POST['id'];
}

if ($marker && $marker['error'] == UPLOAD_ERR_OK) {
    // vérification du format de l'image téléchargée
    $imageType = $marker['type'];
    if ($imageType != "image/svg+xml") {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls le format svg est autorisé.</p>';
        exit;
    }

    // création d'un nouveau nom pour cette image téléchargée
    $image_num = $nombre_lignes + 1;
    $nouvelle_image = 'image'.$image_num.'.svg';

    if (is_uploaded_file($marker["tmp_name"])) {
        if (!move_uploaded_file($marker["tmp_name"], "../data/images/markers/" . $nouvelle_image)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
            exit;
        }
    } else {
        echo '<p>Problème : image non chargée...</p>';
        exit;
    }
} else {
        switch ($marker['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo '<p>Problème : la taille de l\'image dépasse la limite autorisée.</p>';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo '<p>Problème : le téléchargement de l\'image n\'a été que partiellement complété.</p>';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo '<p>Problème : aucun fichier n\'a été téléchargé.</p>';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo '<p>Problème : aucun répertoire temporaire n\'a été configuré pour sauvegarder les fichiers téléchargés.</p>';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo '<p>Problème : impossible d\'écrire le fichier sur le disque.</p>';
                break;
            case UPLOAD_ERR_EXTENSION:
                echo '<p>Problème : une extension PHP a arrêté le téléchargement de l\'image.</p>';
                break;
            default:
                echo '<p>Problème avec le fichier image téléchargé.</p>';
                break;
        }
        exit;
    }
// Préparation de la requête d'insertion
$req = $mabd->prepare("INSERT INTO $table (id, nom, p_point1, p_point2, p_point3, p_point4, marker, co_marker, adresse, acteur) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

try {
    // Exécution de la requête d'insertion avec les données du formulaire
    $req->execute([$id, $nom, $p_point1, $p_point2, $p_point3, $p_point4, $nouvelle_image, $co_marker, $adresse, $acteur]);

    // Affichage d'un message de succès
    echo "Les données ont été insérées avec succès.<br>";
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../modif_map.php";}, 3000);}</script>';
    exit;
} catch (PDOException $e) {
    // Gestion des erreurs d'insertion
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../modif_map.php";}, 3000);}</script>';
    exit;
}
?>
