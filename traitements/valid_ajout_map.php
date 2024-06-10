<?php 

$auto = $_POST['auto_id'];
$nom = $_POST['nom']; 
$p_point1 = $_POST['p_point1'];
$p_point2 = $_POST['p_point2'];
$p_point3 = $_POST['p_point3'];
$p_point4 = $_POST['p_point4'];
$marker_p_point = $_POST['p_point'];
$model = $_FILES['image'];
require('conf.inc.php');try {
    $mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);    
    
    $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT COUNT(*) AS total_lignes FROM $jardins";
    $requete = $mabd->prepare($sql);
    $requete->execute();
    
    $row = $requete->fetch(PDO::FETCH_ASSOC);
    $nombre_lignes = $row['total_lignes'];
    
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
if(isset($_POST['auto_id'])){
    $id = $nombre_lignes + 1;
}
else{
$id = $_POST['id'];
}
if ($imageName != "") {
    // vérification du format de l'image téléchargée
    $imageType = $_FILES["image"]["type"];
    if ($imageType != "image/svg+xml") {
        var_dump($imageType);
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls le format svg  est autorisé.</p>';
        die();
    }

    // création d'un nouveau nom pour cette image téléchargée
    $image_num = $nombre_lignes + 1;
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
$req = $mabd->prepare("INSERT INTO jardins ( 
                id = '$id';
                nom = '$nom';
                p_point1 = '$p_point1',
                p_point2 = '$p_point2',
                p_point3 = '$p_point3',
                p_point4 = '$p_point4',
                co_marker = '$marker_p_point',
                marker = '$nouvelle_image'
                 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
try {
    $req->execute([$id, $nom, $p_point1, $p_point2, $p_point3, $p_point4, co_marker, $marker]);

    // Afficher un message de succès si aucune exception n'est lancée
    echo "Les données ont été insérées avec succès.<br>";
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../map.php?ent=' . urlencode($ent) . '";}, 3000);}</script>';
    exit;
} catch (PDOException $e) {
    // En cas d'erreur lors de l'insertion, afficher l'erreur
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    echo '<script>window.onload = function() {setTimeout(function(){window.location.href = "../ajout_map.php?ent=' . urlencode($ent) . '";}, 3000);}</script>';
    exit;
}
}
