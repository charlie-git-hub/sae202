<!DOCTYPE html>
<html>
<head>
    <title>Gestion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card-content {
            margin-top: 10px;
        }

        .card-content p {
            margin: 5px 0;
        }

        .actions {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .actions a {
            text-decoration: none;
            color: #007BFF;
            margin: 1rem;
        }
#b_ajout{
    border: 1px solid #ccc;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #2990ff;
}
        @media (min-width: 600px) {
            .card {
                flex-direction: row;
                align-items: center;
            }

            .card img {
                width: 150px;
                height: 150px;
                margin-right: 20px;
            }

            .card-content {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gestion des Jardins</h1>
            <a id="b_ajout"href="ajout_map.php">Ajout</a>
        </div>

        <?php 
        include('traitements/conf.inc.php');

        try {
            $mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);
            $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            $jardins = 'SELECT * FROM jardins';
            $resultat_jardins = $mabd->query($jardins);

            foreach ($resultat_jardins as $jardin) {
                echo '<div class="card">';
                echo '<img src="data/images/markers/' . htmlspecialchars($jardin['marker']) . '" alt="Marker">';
                echo '<div class="card-content">';
                echo '<p><strong>Nom:</strong> ' . htmlspecialchars($jardin['nom']) . '</p>';
                echo '<p><strong>Adresse:</strong> ' . htmlspecialchars($jardin['adresse']) . '</p>';   
                echo '<p><strong>Acteur:</strong> ' . htmlspecialchars($jardin['acteur']) . '</p>';   
                echo '<p><strong>Coordonnées marker:</strong> ' . htmlspecialchars($jardin['co_marker']) . '</p>';
                echo '<p><strong>Coordonnées point 1:</strong> ' . htmlspecialchars($jardin['p_point1']) . '</p>';
                echo '<p><strong>Coordonnées point 2:</strong> ' . htmlspecialchars($jardin['p_point2']) . '</p>';
                echo '<p><strong>Coordonnées point 3:</strong> ' . htmlspecialchars($jardin['p_point3']) . '</p>';
                echo '<p><strong>Coordonnées point 4:</strong> ' . htmlspecialchars($jardin['p_point4']) . '</p>';
                echo '</div>';
                echo '<div class="actions">';
                echo '<a class="supp" href="traitements/supp_map.php?nom=' . urlencode($jardin['nom']) . '">Supprimer</a>';
                echo '<a href="modif_map.php?nom=' . urlencode($jardin['nom']) . '">Modifier</a>';
                echo '</div>';
                echo '</div>';
            }

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            exit;
        }
        ?>
    </div>

    <script>
        document.querySelectorAll('.supp').forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault();

                var confirmation = confirm('Êtes-vous sûr.e ?');
                
                if (confirmation) {
                    window.location.href = this.href;
                }
            });
        });
    </script>
</body>
</html>
