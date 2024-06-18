<?php
session_start();
?>
<?php
$titre="Gestion table favori";
?>
<link rel="stylesheet" href="../style5.css">
</head>
<body>
    <nav>
    <div class="admin_gestion">
<a href="../index.php"><button class="button">Retour à l'accueil</button></a>
<a href="tableCompte_gestion.php"><button class="button">Gestion Compte</button></a>
<a href="tableFavori_gestion.php"><button class="button">Gestion Favori</button></a>
<a href="tableNotes_gestion.php"><button class="button">Gestion Notes</button></a>
<a href="tableJardins_gestion.php"><button class="button">Gestion Jardins</button></a>
<a href="tableParcelles_gestion.php"><button class="button">Gestion Parcelles</button></a>
</nav>
<table class="position-table">
	<thead>
<table class="position-table">
	<thead>
		<tr><th>ID</th><th>ID du Jardin Liké</th><th>ID du compte qui a Like</th></tr>
	</thead>
	<tbody>
<?php
require('../base.php');
$req = "SELECT * FROM favori";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['id_favori'] . '</td>';
    echo '<td>' . $value['_id_jardins'] . '</td>';
    echo '<td>' . $value['_id_compte'] . '</td>';
    echo '<td> <a href="tableFavori_delete.php?num='.$value['id_favori'].'" class="crud"> supprimer </a> </td>';
    echo '<td> <a href="tableFavori_update_form.php?num='.$value['id_favori'].'" class="crud"> modifier </a> </td>';
    echo '</tr>';
}
    ?>
    <tbody>
</table>
