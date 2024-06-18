<?php
session_start();
?>
<?php
$titre="Gestion table jardins";

?>
<link rel="stylesheet" href="../style5.css">
<nav>
    <div class="admin_gestion">
<a href="../index.php"><button class="button">Retour à l'accueil</button></a>
<a href="tableCompte_gestion.php"><button class="button">Gestion Compte</button></a>
<a href="tableFavori_gestion.php"><button class="button">Gestion Favori</button></a>
<a href="tableNotes_gestion.php"><button class="button">Gestion Notes</button></a>
<a href="tableJardins_gestion.php"><button class="button">Gestion Jardins</button></a>
<a href="tableParcelles_gestion.php"><button class="button">Gestion Parcelles</button></a>
</nav>
<a href="crud_admin.php" class="gestion">Retour</a>
<a href="tableJardins_new_form.php" class="gestion">Ajouter un jardin</a>
<table class="position-table">
	<thead>
		<tr><th>id</th><th>nom du jardin</th><th>photo du jardin</th><th>adresse du jardin</th><th>coordonnées du jardin</th><th>propriétaire du jardin</th><th>résumé du jardin</th><th>contenu du jardin</th><th>id propriétaire du jardin</th></tr>
	</thead>
	<tbody>
<?php
require('../base.php');
$req = "SELECT * FROM jardins";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td class="table-1">'.$value['id_jardins'] . '</td>';
    echo '<td class="table-1">' . $value['nom_jardins'] . '</td>';
    echo '<td class="table-1"><img src="../images/' . $value['img_jardins'] . '"></td>';
    echo '<td class="table-1">' . $value['adresse_jardins'] . '</td>';
    echo '<td class="table-1">' . $value['acteur_jardins'] . '</td>';
    echo '<td class="table-1">' . $value['résumé_jardins'] . '</td>';
    echo '<td class="table-1">' . $value['contenu_jardins'] . '</td>';
    echo '<td class="table-1">' . $value['_id_compte'] . '</td>';
    echo '<td> <a href="tableJardins_delete.php?num='.$value['id_jardins'].'" class="crud"> supprimer </a> </td>';
    echo '<td> <a href="tableJardins_update_form.php?num='.$value['id_jardins'].'" class="crud"> modifier </a> </td>';
    echo '</tr>';
}
    ?>
    <tbody>
</table>
