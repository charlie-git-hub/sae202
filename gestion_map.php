<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <a href="ajout_map.php">ajout</a>
    <?php 
    include('traitements/conf.inc.php');

    try {
        $mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;',USER,PASSWORD);
        $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $jardins = 'SELECT * FROM jardins';
        $resultat_jardins = $mabd->query($jardins);

        echo '<table id="listing">';
        echo '<tr><th>nom</th><th>adresse</th><th>acteur</th><th>co_marker</th><th>p_point1</th><th>p_point2</th><th>p_point3</th><th>p_point4</th><th>marker</th><th>actions</th></tr>';

        foreach ($resultat_jardins as $jardin) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($jardin['nom']) . '</td>';
            echo '<td>' . htmlspecialchars($jardin['adresse']) . '</td>';   
            echo '<td>' . htmlspecialchars($jardin['acteur']) . '</td>';   
            echo '<td>' . htmlspecialchars($jardin['co_marker']) . '</td>';
            echo '<td>' . htmlspecialchars($jardin['p_point1']) . '</td>';
            echo '<td>' . htmlspecialchars($jardin['p_point2']) . '</td>';
            echo '<td>' . htmlspecialchars($jardin['p_point3']) . '</td>';
            echo '<td>' . htmlspecialchars($jardin['p_point4']) . '</td>';
            echo '<td id="tab_img">' . '<img src="data/images/markers/' . htmlspecialchars($jardin['marker']) . '" alt="Marker"></td>'; 
            echo '<td>';
            echo '<td><a class="supp" href="traitements/supp_map.php?nom=' . urlencode($jardin['nom']) . '">supprimer</a> </td>';
            echo '<td><a href="modif_map.php?nom=' . urlencode($jardin['nom']) . '">modifier</a></td>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
    ?>
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
