<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression de favori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .gestion {
            display: inline-block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .gestion:hover {
            text-decoration: underline;
        }
        .valide {
            color: #28a745;
        }
        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Suppression de favori</h1>
        <a href="tableFavori_gestion.php" class="gestion">Retour</a><br><br>	
        
        <?php
        // Récupérer dans l'URL l'ID du favori à supprimer
        $id_favori = $_GET['num'];

        require('../base.php');

        // Requête de suppression du favori dont l'ID est passé dans l'URL
        $req = 'DELETE FROM favori WHERE id_favori=' . $id_favori . ';'; 

        // Exécution de la requête
        $resultat = $mabd->query($req);

        echo "<div class='message'>";
        echo "<p class='valide'>Le favori numéro $id_favori a été supprimé avec succès.</p>";
        echo "<p>Merci de contribuer à rendre notre communauté de co-jardinage plus dynamique et agréable. N'hésitez pas à ajouter de nouveaux favoris et à continuer à partager votre passion pour le jardinage avec les autres membres.</p>";
        echo "</div>";
        ?>
    </div>
</body>
</html>
