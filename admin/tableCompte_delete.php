<?php
session_start();
?>
<?php
$titre="Suppression";

?>
<link rel="stylesheet" href="../style5.css">

<?php
// recupérer dans l'url l'id de l'album à supprimer
$id_compte=$_GET['num'];

require('../base.php');

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM compte where id_compte='.$id_compte.';'; 

// cette ligne sert juste pour le debug. à supprimer quand tout marche correctement   
$resultat = $mabd->query($req);

echo "<h1 class='valide'>vous venez de supprimer le compte numéro $id_compte</h2>";
?>
<a href="tableCompte_gestion.php" class="gestion">Retour</a><br>	
