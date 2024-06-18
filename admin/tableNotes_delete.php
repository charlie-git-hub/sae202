<?php
session_start();
?>
<link rel="stylesheet" href="../style5.css">
<?php
$titre="Suppression";
?>
<a href="tableNotes_gestion.php" class="gestion">Retour</a><br>	

<?php
// recupérer dans l'url l'id de l'album à supprimer
$id_notes=$_GET['num'];

require('../base.php');

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM notes where id_notes='.$id_notes.';'; 

// cette ligne sert juste pour le debug. à supprimer quand tout marche correctement   
$resultat = $mabd->query($req);

echo "<h1 class='valide'>vous venez de supprimer la note numéro $id_notes</h2>";
?>

