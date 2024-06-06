<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>

    <form method="POST" action="traitements/valid_ajout_map.php" enctype="multipart/form-data">
        <label for="id">ID :</label>
        <input type="text" name="id" id="id" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="coordonnees">Coordonnées du point :</label>
        <input type="text" name="coordonnees" id="coordonnees" required><br><br>

        <label for="image">Choisir un marker :</label>
        <input type="file" name="image" id="image" required><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
