<?php
// Inclusion du fichier de configuration
require('conf.inc.php');

$id = $_POST['id'] ?? null;
$nom = $_POST['nom'] ?? null; 
$p_point1 = $_POST['p_point1'] ?? null;
$p_point2 = $_POST['p_point2'] ?? null;
$p_point3 = $_POST['p_point3'] ?? null;
$p_point4 = $_POST['p_point4'] ?? null;
$co_marker = $_POST['co_marker'] ?? null;
$marker = $_FILES['marker'] ?? null;
$adresse = $_POST['adresse'] ?? null;
$acteur = $_POST['acteur'] ?? null;

if (!$id || !$nom || !$p_point1 || !$p_point2 || !$p_point3 || !$p_point4 || !$co_marker || !$marker || !$adresse || !$acteur) {
    echo "Tous les champs sont requis.";
    exit;
}

try {
    // Connexion à la base de données
    $mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);    
    $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT COUNT(*) AS total_lignes FROM jardins";
    $requete = $mabd->prepare($sql);
    $requete->execute();
    
    $row = $requete->fetch(PDO::FETCH_ASSOC);
    $nombre_lignes = $row['total_lignes'];
    
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
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

    // dépot du fichier téléchargé dans le dossier /var/www/sae203/images/uploads
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
    echo '<p>Problème avec le fichier image téléchargé.</p>';
    exit;
}

$req = $mabd->prepare("REPLACE  INTO jardins (id, nom, p_point1, p_point2, p_point3, p_point4, marker, co_marker, adresse, acteur) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

try {
    $req->execute([$id, $nom, $p_point1, $p_point2, $p_point3, $p_point4, $nouvelle_image, $co_marker, $adresse, $acteur]);

    echo "Les données ont été insérées avec succès.<br>";
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../gestion_map.php";}, 3000);}</script>';
    exit;
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../gestion_map.php";}, 3000);}</script>';
}
?>
