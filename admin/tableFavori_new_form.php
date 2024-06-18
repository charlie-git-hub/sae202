<?php
session_start();
?>
<?php
$titre="Ajout";
?>
<style>
        textarea {
            resize: none; /* Empêche le redimensionnement du textarea */
        }
</style>
    <a href="tableFavori_gestion.php" class="gestion">Retour</a>
    <div class="formulaire">
        <form method="POST" action="tableFavori_new_valide.php">
            <h2>Choisissez le jardin liké :</h2>
            <select name="id_jardins" required>
                <?php
                require('../base.php');
                $req = "SELECT * FROM jardins";
                $resultat = $mabd->query($req);

                foreach ($resultat as $value) {
                    echo '<option value="'.$value['id_jardins'].'">'.$value['nom_jardins'].'</option>';
                }
                ?>
            </select><br>
            <h2>Choisissez le compte qui souhaite liker :</h2>
            <select name="id_compte" required> 
                <?php
                $req = "SELECT * FROM compte";
                $resultat = $mabd->query($req);

                foreach ($resultat as $value) {
                    echo '<option value="'.$value['id_compte'].'">'.$value['prénom_compte'].'</option>';
                }
                ?>
            </select><br>
            <input type="submit" name="boutton_favori" id="boutton_favori">
        </form>
    </div>

