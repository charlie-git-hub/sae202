<?php
session_start();
$titre="Enregistrement";
require('../header.php');
$compte='admin/compte.php';
    $i=0;
    while (!file_exists($compte)) {
        if($i>10) {
            echo 'Impossible de trouver les fichiers de traitement chat';
            exit;
        }
         
        $compte='../'.$compte;
        $i++;
    }
?>
<main>
    <div class="box" id="compte">
        <form action="valid_enregistrer.php" method="POST">
        <label for="nom">Nom d'utilisateur:</label>
        <input type="text" id="nom" name="nom" placeholder="Veuillez renseigner votre nom d'utilisateur">
        <label for="mail">Adresse mail:</label>
        <input type="text" id="mail" name="mail" placeholder="Veuillez renseigner votre adresse mail">
        <label for="mdp">Mot de passe:</label>
        <input type="text" id="mdp" name="mdp" placeholder="Veuillez renseigner votre mot de passe">
        <label for="mdp2">Retapez votre mot de passe:</label>
        <input type="text" id="mdp2" name="mdp2" placeholder="Veuillez renseigner votre mot de passe une nouvelle fois">
        <h2>Quelle sera votre principale utilisation ?</h2>
        <p>(Ceci est à titre informatif et n'est pas déterminant)</p>
        <div id="compte2">
        <label for="louer">Partager</label>
        <input type="radio" id="louer" name="utilisation" value="louer">
        <label for="emprunter">Emprunter</label>
        <input type="radio" id="emprunter" name="utilisation" value="emprunter">
        <label for="both">Les deux</label>
        <input type="radio" id="both" name="utilisation" value="both">
        <button type="submit" id="valid_compte">Valider</button>
        <h2><a href="<?php echo $compte?>">Vous avez déjà un compte</h2>
        </div>
        </form>
        <?php
        if (isset($_SESSION['enregistrement'])) {
        echo '<p>'.$_SESSION['enregistrement'].'</p>'."\n";
        unset($_SESSION['enregistrement']);
        }
        ?>
    </div>
</main>