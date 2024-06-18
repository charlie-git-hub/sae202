<?php
$titre="Admin";
require('../base.php');
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

<?php
    $req2 = $mabd->prepare('
    SELECT 
        jardins.*, 
        COUNT(parcelles.id_parcelles) AS total_parcelles, 
        SUM(CASE WHEN parcelles.reservation_parcelles = 2 THEN 1 ELSE 0 END) AS parcelles_reservees, 
        SUM(CASE WHEN parcelles.reservation_parcelles = 2 THEN 1 ELSE 0 END) AS parcelles_occupes, 
        GROUP_CONCAT(CASE WHEN parcelles.reservation_parcelles = 2 THEN parcelles.id_parcelles END ORDER BY parcelles.id_parcelles SEPARATOR \'-\') AS parcelles_occupes_list 
    FROM 
        jardins 
    LEFT JOIN 
        parcelles ON jardins.id_jardins = parcelles._id_jardins 
    GROUP BY 
        jardins.id_jardins;
    ');
    $req2->execute();
    $jardins_prop = $req2->fetchAll();

                if (empty($jardins_prop)) {
                    echo "<h3>Vous n'avez proposé aucun jardin.</h3>";
                } else {
                ?>
                <table class="table-jardin">
                    <thead>
                        <tr>
                            <th class="start">Nom du jardin</th>
                            <th>Surface du jardin</th>
                            <th>Occupation du jardin</th>
                            <th>Parcelles occupées</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                <?php
                foreach($jardins_prop as $jardin_prop) {
                    echo '<td>'.$jardin_prop['nom_jardins'].'</td>';
                    echo '<td class="align">'.$jardin_prop['taille_jardins'].' m²</td>';
                    if (($jardin_prop['parcelles_reservees']*100)/25 >=90) {
                        $color_cube = "red";
                    } elseif (($jardin_prop['parcelles_reservees']*100)/25 >= 66) {
                        $color_cube = "orange";
                    } elseif (($jardin_prop['parcelles_reservees']*100)/25 > 33) {
                        $color_cube = "yellow";
                    } else {
                        $color_cube = "green";
                    }
                    echo '<td class="align"><span class="cube" style="background-color: '.$color_cube.'"></span>'.(($jardin_prop['parcelles_reservees']*100)/25).'%</td>';
                    if(!empty($jardin_prop['parcelles_occupes_list'])) {
                        echo '<td class="align">'.$jardin_prop['parcelles_occupes_list'].'</td>';
                    } else {
                        echo '<td class="align">Aucune parcelle n\'est occupée</td>';
                    }
                    echo '</tr>';
                }
                }
                ?>
                </tbody>
                </table>
</div>
