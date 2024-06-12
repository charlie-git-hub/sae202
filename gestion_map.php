<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <a href="ajout_map.php">ajout<a>
  <?php 
include('traitements/conf.inc.php');
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);$mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$jardins = 'SELECT * FROM jardins';
$resultat_jardins = $mabd->query($jardins);

echo '<table id="listing">';
echo '<tr><th>nom</th><th>adresse</th><th>acteur</th><th>co_marker</th><th>p_point1</th><th>p_point2</th><th>p_point3</th><th>p_point4</th><th>marker</th></tr>';

foreach ($resultat_jardins as $jardin) {
  echo '<tr>';
  echo '<td>' . $jardin['nom'] . '</td>';
  echo '<td>' . $jardin['adresse'] . '</td>';   
  echo '<td>' . $jardin['acteur'] . '</td>';   
  echo '<td>' . $jardin['co_marker'] . '</td>';
  echo '<td>' . $jardin['p_point1'] . '</td>';
  echo '<td>' . $jardin['p_point2'] . '</td>';
  echo '<td>' . $jardin['p_point3'] . '</td>';
  echo '<td>' . $jardin['p_point4'] . '</td>';
  echo '<td id="tab_img">' . '<img src="data/images/markers/' . $jardin['marker'] . '"></td>'; 
  echo '<td> <a id="supp" href="supp_map.php?nom=' . $jardin['nom'] . '" > supprimer </a> </td>';  
  echo '<td> <a href="modif_map.php?nom=' . $jardin['nom'] . '" > modifier </a> </td>';
  echo '</tr>';
}

echo '</table>';


?>
<script>
    var btn = document.getElementById('supp');

    btn.addEventListener('click', function(event) {
        // Empêche le comportement par défaut du bouton
        event.preventDefault();

        // Affiche une boîte de dialogue avec une confirmation
        var confirmation = confirm('Êtes-vous sûr.e ?');
        
        // Vérifie la réponse de l'utilisateur
        if (confirmation) {
            // Si l'utilisateur clique sur "OK", redirige vers le premier lien
            window.location.href = "supp_map.php";
        } else {
            // Sinon, ne fait rien ou effectue une autre action si nécessaire
            // Par exemple, afficher un message ou juste retourner
            return;
        }
    });
</script>


</body>
</html>
