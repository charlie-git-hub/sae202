<?php
session_start();
?>

<?php
$titre="Gestion table notes";
?>
<link rel="stylesheet" href="../style5.css">
</head>
<body>
    <nav>
    <div class="admin_gestion">
<a href="tableCompte_gestion.php"><button class="button">Gestion Compte</button></a>
<a href="tableFavori_gestion.php"><button class="button">Gestion Favori</button></a>
<a href="tableNotes_gestion.php"><button class="button">Gestion Notes</button></a>
<a href="tableJardins_gestion.php"><button class="button">Gestion Jardins</button></a>
<a href="tableParcelles_gestion.php"><button class="button">Gestion Parcelles</button></a>

</nav>
<a href="crud_admin.php" class="gestion">Retour</a>
<a href="tableNotes_new_form.php" class="gestion">Ajouter une note</a>
<table class="position-table">
	<thead>
		<tr><th>id</th><th>notes attribués (/5)</th><th>avis détaillé (optionnel)</th><th>Photo complétant l'avis (optionnel)</th><th>Date de l'avis</th><th>id du jardin noté</th><th>id du compte ayant noté</th></tr>
	</thead>
	<tbody>
<?php
require('../base.php');
$req = "SELECT * FROM notes";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['id_notes'] . '</td>';
    echo '<td>' . $value['ajout_notes'] . '</td>';
    echo '<td>' . $value['ajout_avis'] . '</td>';
    echo '<td><img src="../images/uploads_avis/' . $value['photo_avis'] . '"></td>';
    echo '<td>' . $value['date_avis'] . '</td>';
    echo '<td>' . $value['_id_jardins'] . '</td>';
    echo '<td>' . $value['_id_compte'] . '</td>';
    echo '<td> <a href="tableNotes_delete.php?num='.$value['id_notes'].'" class="crud"> supprimer </a> </td>';
    echo '<td> <a href="tableNotes_update_form.php?num='.$value['id_notes'].'" class="crud"> modifier </a> </td>';
    echo '</tr>';
}
    ?>
    <tbody>
</table>
