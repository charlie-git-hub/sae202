<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>

    <form method="POST" action="traitement.php">
        <label for="id">ID :</label>
        <input type="text" name="id" id="id" required><br><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="message">Message :</label>
        <textarea name="message" id="message" required></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>