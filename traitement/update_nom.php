<?php
session_start();
require('../base.php');
?>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../style2.css">
<link rel="stylesheet" href="../style3.css">
<link rel="stylesheet" href="../tb.css">
<a href="../user/dashboard.php" class="btn-mdp form-btn" >Retour</a><br>
<?php
$id = $_SESSION['id'];
$req = "SELECT * FROM compte WHERE `id_compte`= $id";
$resultat = $mabd->query($req);
$compte = $resultat->fetch();

?>
<title>Modifier votre nom | Potajou</title>
<div class="modif-mdp">
<form method="POST" action="update_nom_valid.php">
<input type="text" placeholder="Votre nom d'utilisateur actuel" name="former_nom" class="input-03"  id="former_nom" value="<?php echo $compte['prénom_compte']; ?>" ><br>
<input type="text" placeholder="Votre nouveau nom d'utilisateur" name="new_nom" class="input-03" id="new_nom" value=""><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="recup_nom" value="<?php echo $compte['prénom_compte']; ?>">
<input type="submit" class="form-btn" name="boutton_nom" id="boutton_nom">
</form>
<?php
    if (isset($_SESSION['update_nom'])) {
        echo $_SESSION['update_nom'];
        // Supprime le message après affichage
        unset($_SESSION['update_nom']);
    }
    ?>
</div>
