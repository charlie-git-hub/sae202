<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <style> 
        #map { height: 100vh; } 
    </style>
    <title>Document</title>
</head>
<body>
<?php
//Récupérer le nom de l'image depuis les paramètres d'URL et le décoder
$filename = urldecode($_GET['image_nom']);

// Inclure le fichier de configuration pour les informations de connexion à la base de données
require ('traitements/conf.inc.php');

try {
    // Créer une nouvelle connexion PDO à la base de données
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    // Définir le mode d'erreur PDO sur Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour récupérer les informations du jardin correspondant au nom de l'image
    $req = $db->prepare("SELECT * FROM jardins WHERE nom = :nom");
    $req->execute(array('nom' => $filename));

    // Récupérer tous les résultats de la requête dans un tableau associatif
    $jardins = $req->fetchAll(PDO::FETCH_ASSOC);
 

} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo 'Erreur : ' . $e->getMessage();
}
?>
<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        
<script>
    
    const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    const CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });

    const Stadia_AlidadeSmoothDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
        minZoom: 0,
        maxZoom: 20,
        attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        ext: 'png'
    });

    const map = L.map('map', {
        center: [48.299999, 4.08333],
        zoom: 13,
        layers: [CartoDB_Positron]
    });

    const baseLayers = {
        'coloré': osmHOT,
        'clair': CartoDB_Positron,
        'nuit': Stadia_AlidadeSmoothDark
    };</script>

<?php
echo '<script>';
foreach ($jardins as $jardin){
    echo "var image_nom = L.icon({
        iconUrl: 'data/images/markers/".$jardin['marker']."',
        iconSize: [30, 140],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    });
    var polygon_" .$jardin['id']. "= L.polygon([
        [".$jardin['p_point_1']."],
        [".$jardin['p_point_2']."],
        [".$jardin['p_point_3']."],
        [".$jardin['p_point_4']."]
    ], {
        color: '#5e7f38'
    }).addTo(map);";

    echo "var marker".$jardin['id']." = L.marker([".$jardin['marker']."], {
        icon: image_nom,
        alt: '" .$jardin['nom']."'
    }).addTo(map).bindPopup('".$jardin['nom']."<br>".$jardin['adresse']."');";

echo '</script>';
}
?>
