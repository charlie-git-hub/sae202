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
<form method="POST" action="update_mdp_valid.php">
<label for="former_mdp">Votre mot de passe actuel :</label>
<input type="text" name="former_mdp" id="former_mdp" value="" ><br>
<label for="new_mdp">Votre nouveau mot de passe :</label>
<input type="text" name="new_mdp" id="new_mdp" value=""><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="boutton_mdp" id="boutton_mdp">
</form>
<?php

require('../footer.php')
?>