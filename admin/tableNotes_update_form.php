<?php
session_start();
?>
<link rel="stylesheet" href="../style5.css">
<?php
$titre="Modification";
require('../base.php');
$num = $_GET['num'];
$req = "SELECT * FROM notes WHERE `id_notes`=$num";
$resultat = $mabd->query($req);
$notes = $resultat->fetch();
?>
<style>
        .gestion {
    display: inline-block;
    text-decoration: none;
    color: green; /* Couleur bleue */
    font-weight: bold;
    margin-bottom: 20px;
}

.formulaire {
    max-width: 600px;
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    background-color: transparent;
    border-radius: 8px;
    margin-top: 20px;
}

/* Styles spécifiques au formulaire */
.formulaire label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.formulaire input[type="number"],
.formulaire input[type="text"],
.formulaire select,
.formulaire input[type="date"] {
    width: calc(100% - 10px);
    padding: 10px;
    margin-bottom: 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.formulaire input[type="file"] {
    margin-bottom: 15px;
}

.formulaire textarea {
    width: calc(100% - 10px);
    padding: 10px;
    margin-bottom: 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    resize: vertical; /* Permet le redimensionnement vertical */
}

.formulaire input[type="submit"] {
    background-color: green;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.formulaire input[type="submit"]:hover {
    background-color: green;
}

/* Autres styles */
.custom-file-label {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 10px;
    margin-bottom: 10px;
    display: block;
    background-color: green; /* Couleur de fond gris clair */
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
}

textarea {
    resize: none; /* Empêche le redimensionnement du textarea */
}
</style>

<a href="tableNotes_gestion.php" class="gestion">Retour</a><br>

<div class="formulaire">
<form method="POST" action="tableNotes_update_valide.php">
    <label for="note">Note sur 5* :</label>
    <input type="number" name="note" id="note" min="1" max="5" value="<?php echo $notes['ajout_notes'];?>" required>
    <label for="avis">Avis détaillé :</label>
    <input type="text" placeholder="Écrivez votre avis détaillé ici..." value="<?php echo $notes['ajout_avis']; ?>" required></textarea>
    <label for="photo">Photo accompagnant l'avis :</label>
    <input type="file" name="photo" id="photo">
    <label for="date">Date de l'avis* :</label>
    <input type="date" name="date" id="date" readonly required>
    <h2>Choisissez le jardin à noter:</h2>
    <select name="id_jardins" required>
    <?php
            $req = "SELECT id_jardins, nom_jardins FROM jardins";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($notes['_id_jardins'] == $value['id_jardins']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_jardins'] . '"> ' . $value['nom_jardins'] . '</option>';
            }
        ?>
    </select><br>
    <h2>Choisissez le compte qui souhaite noter :</h2>
    <select name="id_compte" required> 
    <?php
            $req = "SELECT id_compte, prénom_compte FROM compte";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($notes['_id_compte'] == $value['id_compte']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_compte'] . '"> ' . $value['prénom_compte'] . '</option>';
            }
        ?>
    </select><br>   
    <input type="hidden" name="num" id="num" value="<?php echo $num;?>">
<input type="submit" name="boutton_notes" id="boutton_notes">
</form>
</div>
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>
