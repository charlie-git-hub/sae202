<?php
$titre="Modification";
require('../base.php');
session_start();
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
<title>Modifier votre E-mail | Potajou</title>
<div class="modif-mdp">
<form method="POST" action="update_mail_valid.php">
<input type="text" class="input-03" placeholder="Votre e-mail actuel" name="former_mail" id="former_mail" value="<?php echo $compte['mail_compte'] ?>" ><br>
<input type="text" class="input-03"  placeholder="Votre nouvelle e-mail" name="new_mail" id="new_mail" value=""><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="recup_mail" value="<?php echo $compte['mail_compte']; ?>">
<input type="submit" class="form-btn"  name="boutton_mail" id="boutton_mail">
</form>
<?php
    if (isset($_SESSION['update_mail'])) {
        echo $_SESSION['update_mail'];
        // Supprime le message après affichage
        unset($_SESSION['update_mail']);
    }
    ?>
</div>