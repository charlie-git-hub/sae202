<?php
session_start();
?>
<?php
$titre="Modification";;
require('../base.php');
$num = $_GET['num'];
$req = "SELECT * FROM jardins WHERE `id_jardins`=$num";
$resultat = $mabd->query($req);
$jardins = $resultat->fetch();
?>

<a href="tableJardins_gestion.php" class="gestion">Retour</a><br>

<div class="formulaire">
<form method="POST" action="tableJardins_update_valide.php">
    <label for="nom">Nom du jardin :</label>
    <input type="text" name="nom" id="nom" value="<?php echo $jardins['nom_jardins'];?>">
    <label for="photo" class="custom-file-label">Photo du jardin</label></br>
    <input type="file" name="photo" id="photo" value="<?php echo $jardins['img_jardins'];?>">
    <div class="autocomplete-container">
    <label for="adresse">Adresse du jardin :</label>
    <input type="text" id="adresse" name="adresse" value="<?php echo $jardins['adresse_jardins'];?>" required>
    <div id="suggestions" class="suggestions-container"></div>
    </div>
    <label for="gps">Coordonnées Google Maps :</label>
    <input type="text" id="gps" name="gps" value="<?php echo $jardins['maps_jardins']; ?>" readonly>
    <label for="taille">Surface du jardin en m²:</label></br>
    <input type="number" name="taille" id="taille" value="<?php echo $jardins['taille_jardins'];?>"></br>
    <label for="proprietaire">Acteur du jardin :</label>
    <input type="text" name="proprietaire" id="proprietaire" value="<?php echo $jardins['acteur_jardins'];?>">
    <label for="résumé">Description du jardin (50 caractères minimum) :</label>
    <input type="text" name="résumé" id="résumé" value="<?php echo $jardins['résumé_jardins'];?>">
    <label for="contenu">Contenu du jardin :</label>
    <input type="text" name="contenu" id="contenu" value="<?php echo $jardins['contenu_jardins'];?>">
    <label for="id_compte">Utilisateur propriétaire du jardin :</label><br>
    <select name="id_compte" required>
    <?php
            $req = "SELECT id_compte, prénom_compte FROM compte";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($jardins['_id_compte'] == $value['id_compte']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_compte'] . '"> ' . $value['prénom_compte'] . '</option>';
            }
        ?>
    </select><br>
    <input type="hidden" name="num" id="num" value="<?php echo $num;?>">
    <input type="submit" name="boutton_jardins" id="boutton_jardins">
</form>
</div>
<script>
    async function fetchAddresses(query) {
        const response = await fetch(`https://api-adresse.data.gouv.fr/search/?q=${query}`);
        const data = await response.json();
        return data.features.map(feature => ({
            label: feature.properties.label,
            coordinates: feature.geometry.coordinates
        }));
    }

    function showSuggestions(suggestions) {
        const suggestionsContainer = document.getElementById('suggestions');
        suggestionsContainer.innerHTML = '';
        suggestions.forEach(suggestion => {
            const div = document.createElement('div');
            div.textContent = suggestion.label;
            div.classList.add('suggestion-item');
            div.addEventListener('click', () => {
                document.getElementById('adresse').value = suggestion.label;
                document.getElementById('gps').value = `${suggestion.coordinates[1]}, ${suggestion.coordinates[0]}`;
                suggestionsContainer.innerHTML = '';
            });
            suggestionsContainer.appendChild(div);
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('adresse');
        input.addEventListener('input', async () => {
            const query = input.value;
            if (query.length > 2) {
                const suggestions = await fetchAddresses(query);
                showSuggestions(suggestions);
            } else {
                document.getElementById('suggestions').innerHTML = '';
            }
        });
    });
</script>
