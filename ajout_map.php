<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>

<h1>Ajout</h1>

<form method="POST" action="traitements/valid_ajout_map.php" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="id">ID :</label>
    <input type="text" name="id" id="id"  onblur="checkId()">
    <span id="id-error" style="color: red;"></span><br>
    <input type="checkbox" id="auto_id" name="auto_id" />
    <label for="auto_id">automatique</label><br><br>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required><br><br>

    <label for="adresse">adresse :</label>
    <input type="text" name="adresse" id="adresse" required><br><br>
    
    <label for="acteur">acteur :</label>
    <input type="text" name="acteur" id="acteur" required><br><br>

    <label for="p_point1">Coordonnées du point 1 :</label>
    <input type="text" name="p_point1" id="p_point1" required><br><br>

    <label for="p_point2">Coordonnées du point 2 :</label>
    <input type="text" name="p_point2" id="p_point2" required><br><br>

    <label for="p_point3">Coordonnées du point 3 :</label>
    <input type="text" name="p_point3" id="p_point3" required><br><br>

    <label for="p_point4">Coordonnées du point 4 :</label>
    <input type="text" name="p_point4" id="p_point4" required><br><br>

    <label for="co_marker">Coordonnées du marker :</label>
    <input type="text" name="co_marker" id="co_marker" required><br><br>

    <label for="marker">Choisir une image pour le marker :</label>
    <input type="file" name="marker" id="marker" required><br><br>

    <input type="submit" value="Envoyer">
</form>

<script>
function validateForm() {
    const p_pointFields = ['p_point1', 'p_point2', 'p_point3', 'p_point4', 'p_point'];
    const p_pointPattern = /^-?\d+(\.\d+)?,-?\d+(\.\d+)?$/;

    for (let field of p_pointFields) {
        const value = document.getElementById(field).value;
        if (!p_pointPattern.test(value)) {
            alert('Les coordonnées doivent être au format "latitude,longitude".' <br>'Ne mettez aucun espaces et utilisez des points pour les décimales.');
            return false;
        }
    }
    return true;
}

function checkId() {
    const id = document.getElementById('id').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'traitements/check_id.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            const idError = document.getElementById('id-error');
            if (response === 'exists') {
                idError.textContent = 'Cet ID est déjà utilisé.';
            } else {
                idError.textContent = '';
            }
        }
    };
    xhr.send('id=' + id);
}function toggleFields() {
    var id = document.getElementById('id');
    var auto_id = document.getElementById('auto_id');

    if (auto_id.checked) {
        id.disabled = true;
    } else {
        id.disabled = false;
    }

    if (id.value !== '') {
        auto_id.disabled = true;
    } else {
        auto_id.disabled = false;
    }
}

// Appel initial de la fonction pour configurer les champs
toggleFields();

// Écouteur d'événement pour les changements dans auto_id
document.getElementById('auto_id').addEventListener('change', toggleFields);

// Écouteur d'événement pour les changements dans id
document.getElementById('id').addEventListener('input', toggleFields);
</script>

</body>
</html>
