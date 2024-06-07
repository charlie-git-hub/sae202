<?php 
$nom = $_POST['nom']; // Utilisation de $_POST pour récupérer les données du formulaire
$coordonnees1 = $_POST['coordonnees1'];
$coordonnees2 = $_POST['coordonnees2'];
$coordonnees3 = $_POST['coordonnees3'];
$coordonnees4 = $_POST['coordonnees4'];
$marker_coordonnees = $_POST['coordonnees'];
$model = $_FILES['image'];
var_dump($model);
require('conf.inc.php');
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);    
$mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$mabd->query('SET NAMES utf8;');
$imageName = $_FILES["image"]["name"];

if ($imageName != "") {
    // vérification du format de l'image téléchargée
    $imageType = $_FILES["image"]["type"];
    if ($imageType != "image/svg+xml") {
        var_dump($imageType);
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls le format svg  est autorisé.</p>';
        die();
    }

    // création d'un nouveau nom pour cette image téléchargée
    $image_num = $nbFichiers + 1;
    $nouvelle_image = 'image'.$image_num.'.svg';

    // dépot du fichier téléchargé dans le dossier /var/www/sae203/images/uploads
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], "../data/images/markers/" . $nouvelle_image)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>';
        die();
    }
} else {
    $sql = "SELECT COUNT(*) as count FROM votre_table";
    $id = $sql +1;
    var_dump($id);
$req = $mabd->prepare("INSERT INTO entites ( p_point1 = '$coordonnees1',
                p_point2 = '$coordonnees2',
                p_point3 = '$coordonnees3',
                p_point4 = '$coordonnees4',
                co_marker = '$marker_coordonnees',
                marker = '$nouvelle_image'
                 ) VALUES (?, ?, ?, ?, ?, ?, ?)");
try {
    $req->execute([$ent, $difficulte, $danger, $outil, $attaque, $nouvelleImage]);

    // Afficher un message de succès si aucune exception n'est lancée
    echo "Les données ont été insérées avec succès.<br>";
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../ajout_map.php?ent=' . urlencode($ent) . '";}, 3000);}</script>';
    exit;
} catch (PDOException $e) {
    // En cas d'erreur lors de l'insertion, afficher l'erreur
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../ajout_map.php?ent=' . urlencode($ent) . '";}, 3000);}</script>';
    exit;
}
}
echo 'juste pour le debug: ' . $req;


$encodedImageNom = urlencode($nouvelle_image);
header("Location: ../map.php")
exit();
