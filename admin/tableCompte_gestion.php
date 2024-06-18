<?php
session_start();
?>

<?php
$titre="Gestion table Compte";
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
<a href="crud_admin.php" class="gestion">Retour</a>
<a href="tableCompte_new_form.php" class="gestion">Ajouter un compte</a>
	<thead>
		<tr><th>ID</th><th>Photo de Profil</th><th>Nom d'utilisateur</th><th>E-mail</th></tr>
	</thead>
	<tbody>
<?php
require('../base.php');
$req = "SELECT * FROM compte";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td class="number">'.$value['id_compte'] . '</td>';
    echo '<td class="number">' . $value['img_compte'] . '</td>';
    echo '<td class="number">' . $value['prénom_compte'] . '</td>';
    echo '<td class="number">' . $value['mail_compte'] . '</td>';
    echo '<td> <a href="tableCompte_delete.php?num='.$value['id_compte'].'" class="crud"> supprimer </a> </td>';
    echo '<td> <a href="tableCompte_update_form.php?num='.$value['id_compte'].'" class="crud"> modifier </a> </td>';
    echo '</tr>';
}
    ?>
    <tbody>
</table>
