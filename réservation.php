<?php
session_start();
include 'base.php'; // Inclure votre fichier de connexion à la base de données

require('../header.php');
// ID du jardin à afficher
$id_jardin = $_GET['id_jardin'];

// Préparer et exécuter la requête pour récupérer les parcelles d'un jardin spécifique
$req = $mabd->prepare("SELECT * FROM parcelles WHERE _id_jardins = $id_jardin");
$req->execute();

// Récupérer les résultats de la requête
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

// Initialiser la grille des parcelles
$grille = array_fill(0, 5, array_fill(0, 5, null));

// Remplir la grille avec les parcelles de la base de données
foreach ($parcelles as $index => $parcelle) {
    $i = (int)($index / 5);
    $j = $index % 5;
    $grille[$i][$j] = $parcelle;
}

// Début de la page HTML
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de Parcelles</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(5, 50px);
            grid-template-rows: repeat(5, 50px);
            gap: 5px;
        }
        .cell {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .reserved {
            background-color: red;
        }
        .reserved-by-user {
            background-color: orange;
        }
        .selected {
            background-color: green;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.cell').forEach(cell => {
                cell.addEventListener('click', () => {
                    if (!cell.classList.contains('reserved') && !cell.classList.contains('reserved-by-user')) {
                        cell.classList.toggle('selected');
                        console.log(cell.dataset.id); // Log the selected cell ID for debugging
                    }
                });
            });

            document.getElementById('submit').addEventListener('click', () => {
                let selected = [];
                document.querySelectorAll('.selected').forEach(cell => {
                    selected.push(cell.dataset.id);
                });
                document.getElementById('selected_parcelles').value = selected.join(',');
                document.getElementById('reservation_form').submit();
            });
        });
    </script>
</head>
<body>
    <div class="grid">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <?php for ($j = 0; $j < 5; $j++): ?>
                <?php $parcelle = $grille[$i][$j]; ?>
                <?php if ($parcelle): ?>
                    <div class="cell <?php echo ($parcelle['reservation_parcelles'] == 2) ? 'reserved' : (($parcelle['reservation_parcelles'] == 1) ? 'reserved-by-user' : ''); ?>" data-id="<?php echo $parcelle['id_parcelles']; ?>">
                        <?php echo ($i * 5 + $j + 1); // Afficher les numéros de parcelle de 1 à 25 ?>
                    </div>
                <?php else: ?>
                    <div class="cell" data-id="">
                        <?php echo ""; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        <?php endfor; ?>
    </div>
    <form id="reservation_form" action="reservation_traitement.php" method="POST">
    <label for="debut_emprunt"> Date de début de l'emprunt :</label>
    <input type="date" id="debut_emprunt" name="debut_emprunt" required>
    <label for="fin_emprunt"> Date de fin de l'emprunt (inclus) :</label>
    <input type="date" id="fin_emprunt" name="fin_emprunt" required>
    <button id="submit">Réserver</button>
        <input type="hidden" id="selected_parcelles" name="selected_parcelles">
        <input type="hidden" name="id_jardin" value="<?php echo $id_jardin; ?>">
    </form>
    <?php
    if (isset($_SESSION['affichage_reservation']) && $_SESSION['affichage_reservation']['message']) {
        echo $_SESSION['affichage_reservation']['message'];
        unset($_SESSION['affichage_reservation']);
    }
    ?>
</body>
</html>
