<?php
session_start();
?>
<?php
$titre="Modification";
require('../base.php');
$num = $_GET['num'];
$req = "SELECT * FROM parcelles WHERE `id_parcelles`=$num";
$resultat = $mabd->query($req);
$parcelles = $resultat->fetch();
?>

<a href="tableParcelles_gestion.php" class="gestion">Retour</a><br>
<div class="formulaire">
<form method="POST" action="tableParcelles_update_valide.php">
<input type="hidden" name="num" value="<?php echo $parcelles['id_parcelles']; ?>"><br>
<label for="reservation">Quel est le status de la réservation (0 = disponible / 1 = en attente / 2 = occupé)</label>
<input type="number" name="reservation" id="reservation" min="0" max="2" value="<?php echo $parcelles['reservation_parcelles'];?>"><br>
<label for="date_debut">Quel est la date de début de la réservation</label>
<input type="date" name="date_debut" id="date_debut" value="<?php echo $parcelles['date_debut_parcelles']; ?>"><br>
<label for="date_fin">Quel est la date de fin de la réservation</label>
<input type="date" name="date_fin" id="date_fin" value="<?php echo $parcelles['date_fin_parcelles'] ?>" ><br>
<label for="id_compte">Quel compte fait la réservation ?</label>
<select name="id_compte" required>
    <?php
            $req = "SELECT id_compte, prénom_compte FROM compte";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($parcelles['_id_compte'] == $value['id_compte']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_compte'] . '"> ' . $value['prénom_compte'] . '</option>';
            }
        ?>
    </select><br>
<input type="submit" name="boutton_parcelles" id="boutton_parcelles">
</form>
</div>
