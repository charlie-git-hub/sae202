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
// $filename = urldecode($_GET['image_nom']);

// Inclure le fichier de configuration pour les informations de connexion à la base de données
require('traitements/conf.inc.php');

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $db->query("SELECT id, nom, adresse, co_marker, marker, p_point1, p_point2, p_point3, p_point4 FROM jardins");
    $jardins = $req->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
<script>
   <?php foreach ($jardins as $jardin){
    echo "var image_".$jardin['id'] . "= L.icon({
        iconUrl: 'data/images/markers/" . $jardin['marker'] . "',
        iconSize: [30, 140],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    });\n";
    
} ?>
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
    };

    // Ajouter un contrôle de couche
    L.control.layers(baseLayers).addTo(map);
    <?php foreach ($jardins as $jardin){
    echo "var polygon_" . $jardin['id'] . " = L.polygon([
        [" . $jardin['p_point1'] . "],
        [" . $jardin['p_point2'] . "],
        [" . $jardin['p_point3'] . "],
        [" . $jardin['p_point4'] . "]
    ], {
        color: '#5e7f38'
    }).addTo(map);\n";

    echo "var marker_" . $jardin['id'] . " = L.marker([" . $jardin['co_marker'] . "], {
        icon: image_" . $jardin['id'] . ",
        alt: '" . $jardin['nom'] . "'
    }).addTo(map).bindPopup('" . $jardin['nom'] . "<br>" . $jardin['adresse'] . "');\n";
}
?>

?>


</script>
</body>
</html>