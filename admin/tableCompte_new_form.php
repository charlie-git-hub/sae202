<?php
session_start();
$titre="Ajout";
?>
<link rel="stylesheet" href="../style5.css">
<a href="tableCompte_gestion.php" class="gestion">Retour</a>
<form action="tableCompte_new_valide.php" method="POST" enctype="multipart/form-data">
    <label for="photo">Photo de profil :</label>
    <label for="photo" class="custom-file-label">Vous pouvez déposer une photo ici</label>
    <input type="file" name="photo" id="photo">
    <label for="nom">Nom d'utilisateur :</label>
    <input type="text" id="nom" name="nom">
    <label for="mail">Adresse mail :</label>
    <input type="text" id="mail" name="mail">
    <label for="mdp">Mot de passe :</label>
    <input type="text" id="mdp" name="mdp">
    <button type="submit" id="valid_compte">Valider</button>
  </form>
<script>
    document.getElementById('photo').addEventListener('change', function() {
    var label = document.querySelector('.custom-file-label');
    var fileName = this.files[0].name;
    label.textContent = fileName;
});
</script>
