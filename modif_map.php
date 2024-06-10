
<h1>Ajout</h1>

<form method="POST" action="traitements/valid_ajout_map.php" enctype="multipart/form-data">
    <label for="id">ID :</label>
    <input type="text" name="id" id="id" required><br><br>
    <label for="nom">Nom :</label>
<input type="text" name="nom" id="nom" required><br><br>

<label for="coordonnees1">Coordonnées du point 1 :</label>
<input type="text" name="coordonnees1" id="coordonnees1" required><br><br>

<label for="coordonnees2">Coordonnées du point 2 :</label>
<input type="text" name="coordonnees2" id="coordonnees2" required><br><br>

<label for="coordonnees3">Coordonnées du point 3 :</label>
<input type="text" name="coordonnees3" id="coordonnees3" required><br><br>

<label for="coordonnees4">Coordonnées du point 4 :</label>
<input type="text" name="coordonnees4" id="coordonnees4" required><br><br>


    <label for="coordonnees">Coordonnées du marker :</label>
    <input type="text" name="coordonnees" id="coordonnees" required><br><br>

    <label for="image">Choisir une image pour le marker :</label>
    <input type="file" name="image" id="image" required><br><br>

    <input type="submit" value="Envoyer">
</form>