<?php
$titre="Modification";
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
<form method="POST" action="update_mail_valid.php">
<label for="former_mail">Votre email actuel :</label>
<input type="text" name="former_mail" id="former_mail" value="<?php echo $compte['mail_compte'] ?>" ><br>
<label for="new_mail">Votre nouvel email :</label>
<input type="text" name="new_mail" id="new_mail" value=""><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="recup_mail" value="<?php echo $compte['mail_compte']; ?>">
<input type="submit" name="boutton_mail" id="boutton_mail">
</form>
<?php

require('../footer.php')
?>