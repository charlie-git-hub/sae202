<?php
session_start();
$titre="Compte";
require('../header.php');
require('base.php');

$req = $mabd->prepare('SELECT * FROM compte WHERE id_compte = '.$_SESSION['id'].';');
        $req->execute();
        $comptes = $req->fetchAll();

foreach($comptes as $compte) {
?>
<main>
    <div class="box-compte">
        <div class="space-between">
            <div>
                <h1>Profil</h1>
                <h2>Nom d'utilisateur : <?php echo $compte['prénom_compte']; ?></h2>
                <h3><a href="update_nom.php">Modifier le nom d'utilisateur</a></h3>
                <?php
                if (isset($_SESSION['update_nom'])) {
                    echo $_SESSION['update_nom'];
                    unset($_SESSION['update_nom']);
                    }
                ?>
                <h2>Adresse mail : <?php echo $compte['mail_compte']; ?></h2>
                <h3><a href="update_mail.php">Modifier l'adresse mail</a></h3>
                <?php
                if (isset($_SESSION['update_mail'])) {
                    echo $_SESSION['update_mail'];
                    unset($_SESSION['update_mail']);
                    }
                ?>
                <h3><a href="update_mdp.php">Modifier le mot de passe</a></h3>
                <?php
                if (isset($_SESSION['update_mdp'])) {
                    echo $_SESSION['update_mdp'];
                    unset($_SESSION['update_mdp']);
                    }
                ?>
                <h1>Gestion des jardins</h1>
            </div>
            <div id="tableau-bord">
                <h1>Tableau de bord</h1>
                <h2>Jardin Proposé :</h2>
                <?php
                $req2 = $mabd->prepare('SELECT jardins.*,COUNT(parcelles.id_parcelles) AS total_parcelles, SUM(CASE WHEN parcelles.reservation_parcelles = 2 THEN 1 ELSE 0 END) AS parcelles_reservees FROM jardins LEFT JOIN parcelles ON jardins.id_jardins = parcelles._id_jardins WHERE jardins._id_compte = '.$_SESSION['id'].' GROUP BY jardins.id_jardins;');
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
                            <th>Suppression du jardin ?</th>
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
                    echo '<td class="align"><div class="bouton_supp">';
                    echo "<form action='jardin_delete.php' method='post'>";
                    echo '<input type="hidden" name="nom" value='.$jardin_prop['_id_compte'].'>';
                    echo '<input type="hidden" name="_id_jardins" value='.$jardin_prop['id_jardins'].'>';
                    echo '<button type="submit" class="square red-square">X</button></form></div>';
                    echo '</td>';
                    echo '</tr>';
                }
                }
                ?>
                <form action='jardin_delete.php' method='post'>
                <td><button type="submit" class="square green-square" id="plus">+</button></td>
                </tbody>
                </table>
                <h2>En attente de votre confirmation :</h2>
                <?php
                $req3 = $mabd->prepare('SELECT * FROM parcelles INNER JOIN jardins ON parcelles._id_jardins = jardins.id_jardins INNER JOIN compte ON parcelles._id_compte=compte.id_compte WHERE `reservation_parcelles` = 1 AND jardins._id_compte = '.$_SESSION['id'].';');
                $req3->execute();
                $jardins_attente = $req3->fetchAll();

                if (empty($jardins_attente)) {
                    echo "<h3>Vous n'avez aucune parcelle en attente de confirmation.</h3>";
                } else {
                ?>
                <table class="table-jardin">
                    <thead>
                        <tr>
                            <th class="start">Nom du jardin</th>
                            <th>Numéro de parcelle</th>
                            <th>Demande de l'utilisateur</th>
                            <th>Date début/fin</th>
                            <th>Confirmation ?</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                foreach($jardins_attente as $jardin_attente) {
                    echo '<tr class="jardin_attente">';
                    echo '<td>'.$jardin_attente['nom_jardins'].'</td>';
                    echo '<td class="align">'.$jardin_attente['id_parcelles'].' </td>';
                    echo '<td class="align">'.$jardin_attente['prénom_compte'].' </td>';
                    echo '<div class="flex-column">';
                    echo '<td class="align">'.date("d/m/Y", strtotime($jardin_attente['date_debut_parcelles']));
                    echo '<p>jusqu\'au</p>';
                    echo date("d/m/Y", strtotime($jardin_attente['date_fin_parcelles'])).' </td>';
                    echo "</div>";
                    echo '<td class="align">';
                    echo '<div class="bouton_rep">';
                    echo "<form action='reservation_valid.php' method='post'>";
                    echo '<input type="hidden" name="nom" value='.$jardin_attente['prénom_compte'].'>';
                    echo '<input type="hidden" name="id_parcelles" value='.$jardin_attente['id_parcelles'].'>';
                    echo '<button type="submit" class="square green-square">O</button></form>';
                    echo '/';
                    echo "<form action='reservation_refus.php' method='post'>";
                    echo '<input type="hidden" name="nom" value='.$jardin_attente['prénom_compte'].'>';
                    echo '<input type="hidden" name="id_parcelles" value='.$jardin_attente['id_parcelles'].'>';
                    echo '<button type="submit" class="square red-square">X</button></form>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                    
                }
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
}
require('../footer.php');
?>