<?php
session_start();
?>
<?php
$titre="Modification";
?>

<a href="tableCompte_gestion.php" class="gestion">Retour</a><br>
<link rel="stylesheet" href="../style5.css">
<?php
$num = $_GET['num'];
require('../base.php');
$req = "SELECT * FROM compte WHERE `id_compte`=$num";
$resultat = $mabd->query($req);
$compte = $resultat->fetch();

?>
<div class="formulaire">
<form method="POST" action="tableCompte_update_valide.php" enctype="multipart/form-data">
<p>Voici l'image actuelle :</p>
<?php
echo "<img src='../images/uploads_pdp/" . $compte['img_compte'] . "'>";
?><br>
<input type="hidden" name="num" value="<?php echo $compte['id_compte']; ?>"><br>
<label for="photo" class="custom-file-label">Déposez ici la nouvelle photo de profil </label>
<input type="file" name="photo" id="photo" value="<?php echo $compte['img_compte']; ?>"><br>
<label for="nom">Nom d'utilisateur du compte :</label>
<input type="text" name="nom" id="nom" value="<?php echo $compte['prénom_compte']; ?>"><br>
<label for="mail">Email lié au compte :</label>
<input type="text" name="mail" id="mail" value="<?php echo $compte['mail_compte'] ?>" ><br>
<label for="mdp">Mot de passe hashé du compte :</label>
<input type="text" name="mdp" id="mdp" value="<?php echo $compte['mdp_compte'] ?>" ><br>  
<input type="submit" name="boutton_compte" id="boutton_compte">
</form>
</div>

<script>
    document.getElementById('photo').addEventListener('change', function() {
    var label = document.querySelector('.custom-file-label');
    var fileName = this.files[0].name;
    label.textContent = fileName;
});
</script>
