<?php
session_start();
$titre="Favoris";
require('../header.php');
require('base.php');

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // Redirection vers la page compte.php
    header("Location: compte.php");
    exit(); // Assure que le script s'arrête après la redirection
}

$id = $_SESSION['id'];

$req = $mabd->prepare("SELECT * FROM `jardins` INNER JOIN `favori` ON `jardins`.`id_jardins` = `favori`.`_id_jardins` WHERE `_id_compte` = ".$id.";");
        $req->execute();
        $jardins = $req->fetchAll();

?>
<main>
    <div id="page_panier">
        <div id="panier">
            <h1>Voici le récapitulatif de vos favoris :</h1>
            <div id='affichage_produit'>
                <div class="flex-column">
                <div class='space-around'>
            <?php
                foreach ($jardins as $jardin) {
                    $id_jardins = $jardin['id_jardins'];

                    // Vérifiez si le jardin est déjà dans les favoris
                    $req_verif_favori = $mabd->prepare('SELECT COUNT(*) AS compte FROM favori WHERE `_id_compte` = :id_compte AND `_id_jardins` = :id_jardins');
                    $req_verif_favori->execute([':id_compte' => $id, ':id_jardins' => $id_jardins]);
                    $donnees_favori = $req_verif_favori->fetch();

                    // Déterminer si le jardin est déjà dans les favoris
                    $est_dans_favori = $donnees_favori['compte'] > 0;
                    echo "<div class='fav-container'>";
                    echo "<div class='fav-column'>";
                    echo "<h2 id='lien'><a href='../jardin/jardin.php?id=" . $jardin['id_jardins'] . "' id='lien'>" . $jardin['nom_jardins'] . "</a></h2>";
                    echo "<div class='conteneur-image2'>";
                    echo '<img src="../images/'.$jardin['img_jardins'].'" alt="'.$jardin['img_jardins'].'">';
                    echo "</div>";
                    echo "<h3>".$jardin['acteur_jardins']."</h3>";
                    echo "<div class='favori-rep'>";
                    echo '<form action="ajouter_panier.php" method="post">';
                    echo '<button type="submit" id="ajout_panier2" class="btn-ajout-panier">';
                    echo '<img src="../images/Shopping-icon.svg" class="logo-panier">';
                    echo '<p id="favori-p">Ajouter au réservation</p>';
                    echo "</button>";
                    echo '<input type="hidden" name="id_produits" value="' . $id_jardins . '">';
                    echo '<input type="hidden" name="provenance" value="favori.php">';
                    echo '</form>';
                    echo "<form action='../admin/ajout_favori.php' method='post'>";
                    echo "<button type='submit' class='bouton-invisible' id='heart-produit'>";
                    echo "<svg id='fav' width='32' height='auto' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>";
                    echo "<svg class='feather feather-heart' fill='" . ($est_dans_favori ? 'red' : 'none') . "' height='24' stroke='red' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'>";
                    echo "<path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'/>";
                    echo "</svg>";
                    echo "</svg>";
                    echo "</button>";
                    echo '<input type="hidden" name="id_jardins" value="'.$id_jardins.'">';
                    echo '<input type="hidden" name="id" value="'.$id.'">';
                    echo '<input type="hidden" name="provenance" value="favori.php">';
                    echo "</form>";
                    echo "</div>";
                    if (isset($_SESSION['affichage_panier']) && $_SESSION['affichage_panier']['id_jardins'] == $id_jardins) {
                        echo '<p id="mess-produit2">'.$_SESSION['affichage_panier']['message'].'</p>'."\n";
                        unset($_SESSION['affichage_panier']);
                        }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
                </div>
                </div>
            </div>
        </div>
        <div id="total">
            <div id="affichage_prix">
                <p>test</p>
            </div>
        </div>
    </div>
</main>
<?php
require('../footer.php');
?>
