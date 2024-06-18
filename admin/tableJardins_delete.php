<?php
session_start();
?>
<?php
$titre="Suppression";
?>
<link rel="stylesheet" href="../style5.css">
<a href="tableJardins_gestion.php" class="gestion">Retour</a><br>	

<?php
// recupérer dans l'url l'id de l'album à supprimer
$id_jardins=$_GET['num'];

require('../base.php');

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM jardins where id_jardins='.$id_jardins.';'; 

// cette ligne sert juste pour le debug. à supprimer quand tout marche correctement   
$resultat = $mabd->query($req);

echo "<h1 class='valide'>vous venez de supprimer le jardin numéro $id_jardins</h2>'";
?>

