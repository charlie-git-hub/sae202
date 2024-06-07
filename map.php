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
require ('conf/conf.inc.php');

try {
    // Créer une nouvelle connexion PDO à la base de données
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    // Définir le mode d'erreur PDO sur Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour récupérer les informations du jardin correspondant au nom de l'image
    $req = $db->prepare("SELECT * FROM jardins WHERE nom = :nom");

    // Exécuter la requête avec le paramètre fourni
    $req->execute([':nom' => $filename]);

    // Récupérer le résultat
    $resultat = $req->fetch(PDO::FETCH_ASSOC);

    // Retourner le résultat
    return $resultat;

} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo 'Erreur : ' . $e->getMessage();
}
foreach ($jardins as $jardin): ?>
<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        
<script>
    var carotte = L.icon({
    iconUrl: 'data/images/markers/indicateur_carte.svg',

    iconSize:     [30, 140], 
    iconAnchor:   [22, 94], 
    popupAnchor:  [-3, -76] 
});
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
<? foreach ($jeux as $jeu){
    echo '<tr>';
    echo '<td>' .$jeu['jeu_code'].'</td>';
    echo '<td>' .$jeu['jeu_nom'].'</td>';
    echo '<td>' .$jeu['jeu_editeur'].'</td>';
    echo '<td>' .$jeu['jeu_duree_partie'].'</td>';
    echo '<td><img width="100px" heigth="100px" src="/views/' .$jeu['jeu_photo1'].'"></td>';
    echo '<td><img width="100px" heigth="100px" src="/views/' .$jeu['jeu_photo2'].'"></td>';
    
    echo '</tr>';
}?>
<script>
    var polygon1 = L.polygon([
    [48.27071, 4.08477],
    [48.27025, 4.08402],
    [48.27050, 4.08361],
    [48.27098, 4.08442]
], {
    color: '#5e7f38',
    alt: 'jardins ouvriers et familiaux'
}).addTo(map);


var polygon2 = L.polygon([
    [48.28657, 4.10130],
    [48.28582, 4.10234],
    [48.28608, 4.10315],
    [48.28712, 4.10227]
], {
    color: '#5e7f38',
    alt: 'l\'accord parfait'
}).addTo(map);


var polygon3 = L.polygon([
    [48.30483,4.06099],
    [48.30613,4.06385],
    [48.30501,4.06503],
    [48.30405,4.06188]
], {
    color: '#5e7f38',
    alt: 'jardin de partage'
}).addTo(map);


var polygon4 = L.polygon([
    [48.31037,4.08727],
    [48.31053,4.08807],
    [48.30996,4.08824],
    [48.30961,4.08725],
], {
    color: '#5e7f38',
    alt: 'secours catholique'
}).addTo(map);


var polygon5 = L.polygon([
    [48.28869,4.06285],
    [48.28896,4.06368],
    [48.28966,4.06322],
    [48.28948,4.06262],
], {
    color: '#5e7f38',
    alt: 'jardins rue louis blanc'
}).addTo(map);


var polygon6 = L.polygon([
    [48.29491,4.07697],
    [48.29532,4.07635],
    [48.29575,4.07699],
    [48.29528,4.07752],
], {
    color: '#5e7f38',
    alt: 'jardins quartier seguin'
}).addTo(map);


var polygon7 = L.polygon([
    [48.28616,4.08719],
    [48.28668,4.08829],
    [48.28629,4.08875],
    [48.28568,4.08790],
], {
    color: '#5e7f38',
    alt: 'jardin partagé des viennes'
}).addTo(map);


var polygon8 = L.polygon([
    [48.29498,4.08598],
    [48.29542,4.08662],
    [48.29515,4.086999],
    [48.29479,4.08621],
], {
    color: '#5e7f38',
    alt: 'les jardins familiaux'
}).addTo(map);


var polygon9 = L.polygon([
    [48.26935,4.07955],
    [48.26907,4.08012],
    [48.26882,4.07988],
    [48.26913,4.07921],
], {
    color: '#5e7f38',
    alt: 'jardin jules guesde'
}).addTo(map);


var polygon10 = L.polygon([
    [48.27932,4.06218],
    [48.27864,4.06363],
    [48.27825,4.06339],
    [48.27894,4.06196],
], {
    color: '#5e7f38',
    alt: 'jardin ouvert'
}).addTo(map);
var marker1 = L.marker([48.27066, 4.08424], {
    icon: carotte,
    alt: 'jardins ouvriers et familiaux'
}).addTo(map).bindPopup("jardins ouvriers et familiaux<br>120 Av. Edouard Herriot, 10000 Troyes");


var marker2 = L.marker([48.28645, 4.10231], {
    icon: carotte,
    alt: 'l\'accord parfait'
}).addTo(map).bindPopup("l'accord parfait<br>43 Rue de la Brûlée, 10000 Troyes");


var marker3 = L.marker([48.30503,4.06307], {
    icon: carotte,
    alt: 'jardin de partage'
}).addTo(map).bindPopup("jardin de partage<br>31,2 Av. Marie de Champagne, 10000 Troyes");


var marker4 = L.marker([48.31014,4.08774], {
    icon: carotte,
    alt: 'secours catholique'
}).addTo(map).bindPopup("secours catholique<br>3 Rue Raymond Claudel, 10000 Troyes");


var marker5 = L.marker([48.28919,4.06313], {
    icon: carotte,
    alt: 'jardins rue louis blanc'
}).addTo(map).bindPopup("jardins rue louis blanc<br>42 Av. du Président Wilson, 10120 Saint-André-les-Vergers");


var marker6 = L.marker([48.29533,4.07697], {
    icon: carotte,
    alt: 'jardins quartier seguin'
}).addTo(map).bindPopup("jardins quartier seguin<br>12 Rue Raymond Poincaré, 10000 Troyes");


var marker7 = L.marker([48.28630,4.08808], {
    icon: carotte,
    alt: 'jardin partagé des viennes'
}).addTo(map).bindPopup("jardin partagé des viennes<br>4 Rue Guillaume le Bé, 10000 Troyes");


var marker8 = L.marker([48.29511,4.08649], {
    icon: carotte,
    alt: 'les jardins familiaux'
}).addTo(map).bindPopup("les jardins familiaux<br>12 Rue de l'Abreuvoir de la Pielle, 10000 Troyes");


var marker9 = L.marker([48.26914,4.07959], {
    icon: carotte,
    alt: 'jardin jules guesde'
}).addTo(map).bindPopup("jardin jules guesde<br>H, 10430 Rosières-prés-Troyes");


var marker10 = L.marker([48.27881,4.06275], {
    icon: carotte,
    alt: 'jardin ouvert'
}).addTo(map).bindPopup("jardin ouvert<br>8 Rue Pierre Delostal, 10120 Saint-André-les-Vergers");

</script>
</body>
</html>