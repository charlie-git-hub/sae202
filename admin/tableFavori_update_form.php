<?php
session_start();
?>
<?php
$titre="Modification";
require('../base.php');
$num = $_GET['num'];
$req = "SELECT * FROM favori WHERE `id_favori`=$num";
$resultat = $mabd->query($req);
$favori = $resultat->fetch();
?>

<a href="tableFavori_gestion.php" class="gestion">Retour</a><br>

<div class="formulaire">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }
    .formulaire {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .formulaire h2 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }
    .formulaire select,
    .formulaire input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .formulaire input[type="submit"] {
        background-color: green;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .formulaire input[type="submit"]:hover {
        background-color: green;
    }
    .gestion {
        display: inline-block;
        text-decoration: none;
        color: #28a745; /* Couleur verte */
        font-weight: bold;
        padding: 10px 20px;
        background-color: #d4edda; /* Fond vert clair */
        border: 1px solid #c3e6cb; /* Bordure verte */
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .gestion:hover {
        background-color: #c3e6cb; /* Fond plus clair au survol */
    }
</style>

<form method="POST" action="tableFavori_update_valide.php">
    <h2>Choisissez le jardin à mettre en favori :</h2>
    <select name="id_jardins" required>
    <?php
            $req = "SELECT id_jardins, nom_jardins FROM jardins";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($favori['_id_jardins'] == $value['id_jardins']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_jardins'] . '"> ' . $value['nom_jardins'] . '</option>';
            }
        ?>
    </select><br>
    <h2>Choisissez le compte qui souhaite noter :</h2>
    <select name="id_compte" required> 
    <?php
            $req = "SELECT id_compte, prénom_compte FROM compte";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                $selection = "";
                if ($favori['_id_compte'] == $value['id_compte']) {
                    $selection = "selected";
                }
                echo '<option ' . $selection . ' value="' . $value['id_compte'] . '"> ' . $value['prénom_compte'] . '</option>';
            }
        ?>
    </select><br>  
    <input type="hidden" name="num" id="num" value="<?php echo $num;?>"> 
<input type="submit" name="boutton_favori" id="boutton_favori">
</form>
</div>
