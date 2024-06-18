
<?php
session_start();
$titre="Gestion";
?>
<link rel="stylesheet" href="../style5.css">
<style>
        textarea {
            resize: none; /* Empêche le redimensionnement du textarea */
        }
</style>
    <a href="tableNotes_gestion.php" class="gestion">Retour</a>
    <div class="formulaire">
        <form method="POST" action="tableNotes_new_valide.php" enctype="multipart/form-data">
            <label for="note">Note sur 5* :</label>
            <input type="number" name="note" id="note" min="1" max="5" required>
            <label for="avis">Avis détaillé :</label>
            <textarea name="avis" id="avis" rows="5" cols="40" placeholder="Écrivez votre avis détaillé ici..." required></textarea>
            <label for="photo" class="custom-file-label">Vous pouvez déposer une photo ici</label>
            <input type="file" name="photo" id="photo">
            <label for="date">Date de l'avis* :</label>
            <input type="date" name="date" id="date" readonly required>
            <h2>Choisissez le jardin noté :</h2>
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
            <h2>Choisissez le compte qui souhaite noter :</h2>
            <select name="id_compte" required> 
                <?php
                $req = "SELECT * FROM compte";
                $resultat = $mabd->query($req);

                foreach ($resultat as $value) {
                    echo '<option value="'.$value['id_compte'].'">'.$value['prénom_compte'].'</option>';
                }
                ?>
            </select><br>
            <input type="submit" name="boutton_notes" id="boutton_notes">
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>


