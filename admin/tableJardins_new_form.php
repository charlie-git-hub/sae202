<?php
session_start();
?>
<link rel="stylesheet" href="../style5.css">
<a href="tableJardins_gestion.php" class="gestion">Retour</a>
<form action="tableJardins_new_valide.php" method="POST" enctype="multipart/form-data">
    <label for="photo" class="custom-file-label">Veuillez déposer une photo ici</label></br>
    <input type="file" name="photo" id="photo">
    <label for="nom">Nom du jardin :</label>
    <input type="text" id="nom" name="nom" required>
    <div class="autocomplete-container">
    <label for="adresse">Adresse du jardin :</label>
    <input type="text" id="adresse" name="adresse" required>
    <div id="suggestions" class="suggestions-container"></div>
    </div>
    <label for="gps">Coordonnées Google Maps :</label>
    <input type="text" id="gps" name="gps" readonly>
    <label for="surface">Surface en m² :</label>
    <input type="text" id="surface" name="surface" required>
    <label for="acteur">Nom de l'association/particuliers* :</label>
    <input type="text" id="acteur" name="acteur" required>
    <label for="resume">Description du jardin* (minimum 50 caractères):</label>
    <input type="text" id="resume" name="resume" required>
    <label for="contenu">Contenu du jardin* (listez les avec des virgules):</label>
    <input type="text" id="contenu" name="contenu" required>
    <p>Propriétaire du jardin :</p>
    <select name="id_compte" required>
        <?php
            require('../base.php');
            $req = "SELECT id_compte, prénom_compte FROM compte";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                echo '<option value="'.$value['id_compte'].'">'.$value['prénom_compte'].'</option>';
            }
        ?>
    </select><br>
    <button type="submit" id="valid_compte">Valider</button>
</form>
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
<script>
    document.getElementById('photo').addEventListener('change', function() {
    var label = document.querySelector('.custom-file-label');
    var fileName = this.files[0].name;
    label.textContent = fileName;
});
</script>

