<?php
session_start();
require('../base.php');
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../style2.css">
<link rel="stylesheet" href="../style3.css">
<link rel="stylesheet" href="../tb.css">


<a href="../user/dashboard.php" class="btn-mdp form-btn">Retour</a><br>
<?php
$id = $_SESSION['id'];
$req = "SELECT * FROM compte WHERE `id_compte`= $id";
$resultat = $mabd->query($req);
$compte = $resultat->fetch();

?>
<title>Modifier votre MDP | Potajou</title>
<div class="modif-mdp">
    <form method="POST" action="update_mdp_valid.php">
    <input type="password" placeholder="Votre mot de passe actuel" class="input-03" name="former_mdp" id="former_mdp" value="" ><br>
    <input type="password"  placeholder="Nouveau Mot de passe" class="input-03" name="new_mdp" id="new_mdp" value=""><br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" class="form-btn" name="boutton_mdp" id="boutton_mdp">
    </form>
    <?php
    if (isset($_SESSION['update_mdp'])) {
        echo $_SESSION['update_mdp'];
        // Supprime le message après affichage
        unset($_SESSION['update_mdp']);
    }
    ?>
</div>