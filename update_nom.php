<?php
require('../header.php');
require('base.php');
?>

<a href="paramètre.php">Retour</a><br>
<?php
$id = $_SESSION['id'];
$req = "SELECT * FROM compte WHERE `id_compte`= $id";
$resultat = $mabd->query($req);
$compte = $resultat->fetch();

?>
<form method="POST" action="update_nom_valid.php">
<label for="former_nom">Votre nom d'utilisateur actuel :</label>
<input type="text" name="former_nom" id="former_nom" value="<?php echo $compte['prénom_compte']; ?>" ><br>
<label for="new_nom">Votre nouveau mot de passe :</label>
<input type="text" name="new_nom" id="new_nom" value=""><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="recup_nom" value="<?php echo $compte['prénom_compte']; ?>">
<input type="submit" name="boutton_nom" id="boutton_nom">
</form>
<?php

require('../footer.php')
?>