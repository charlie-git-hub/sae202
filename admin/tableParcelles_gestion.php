<?php
session_start();
?>
<?php
$titre="Gestion table parcelles";
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
<h2>Les parcelles ne peuvent être créer ou supprimer manuellement car elles s'ajoutent seulement lorsqu'un jardin est crée.</h2>
<table class="position-table">
	<thead>
		<tr><th>id</th><th>status de la réservation</br>0 = disponible</br>1 = en attente</br>2 = occupé</th><th>Date début</th><th>Date de fin de l'emprunt</th><th>ID</br>JARDIN/PARCELLES</th><th>ID du compte qui veut la parcelle</br></th></tr>
	</thead>
	<tbody>
<?php
require('../base.php');
$req = "SELECT * FROM parcelles";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['id_parcelles'] . '</td>';
    echo '<td>' . $value['reservation_parcelles'] . '</td>';
    echo '<td>' . $value['date_debut_parcelles'] . '</td>';
    echo '<td>' . $value['date_fin_parcelles'] . '</td>';
    echo '<td>' . $value['_id_jardins'] . '</td>';
    echo '<td>' . $value['_id_compte'] . '</td>';
    echo '<td> <a href="tableParcelles_update_form.php?num='.$value['id_parcelles'].'" class="crud"> modifier </a> </td>';
    echo '</tr>';
}
    ?>
    <tbody>
</table>
