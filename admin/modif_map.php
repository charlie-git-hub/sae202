
<h1>Ajout</h1>
<?php 
$nom = $_GET['nom'];
require ('secret.php');

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $db->prepare("SELECT * FROM jardins WHERE nom = :nom");
    $req->execute([':nom' => $nom]);

    $jardins = $req->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>
<form method="POST" action="valid_modif_map.php" enctype="multipart/form-data">
    <label for="id">ID :</label>
    <input type="text" name="id" id="id"  value="<?php echo $jardins['id']; ?>" required><br><br>
    <label for="nom">Nom :</label>
<input type="text" name="nom" id="nom" value="<?php echo $jardins['nom']; ?>" required><br><br>

<label for="adresse">adresse :</label>
<input type="text" name="adresse" id="adresse" value="<?php echo $jardins['adresse']; ?>" required><br><br>

<label for="acteur">acteur :</label>
<input type="text" name="acteur" id="acteur" value="<?php echo $jardins['acteur']; ?>" required><br><br>

<label for="p_point1">Coordonnées du point 1 :</label>
<input type="text" name="p_point1" id="p_point1" value="<?php echo $jardins['p_point1']; ?>" required><br><br>

<label for="p_point2">Coordonnées du point 2 :</label>
<input type="text" name="p_point2" id="p_point2" value="<?php echo $jardins['p_point2']; ?>" required><br><br>

<label for="p_point3">Coordonnées du point 3 :</label>
<input type="text" name="p_point3" id="p_point3" value="<?php echo $jardins['p_point3']; ?>" required><br><br>

<label for="p_point4">Coordonnées du point 4 :</label>
<input type="text" name="p_point4" id="p_point4" value="<?php echo $jardins['p_point4']; ?>" required><br><br>

    <label for="co_marker">Coordonnées du marker :</label>
    <input type="text" name="co_marker" id="co_marker" value="<?php echo $jardins['co_marker']; ?>" required><br><br>

    <label for="marker">Choisir une image pour le marker :</label>
    <input type="file" name="marker" id="marker" value="<?php echo $jardins['marker']; ?>" required><br><br>

    <input type="submit" value="Envoyer">
</form>

<script>
function checkId() {
    const id = document.getElementById('id').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'traitement/check_id.php', true);
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
}
    </script>