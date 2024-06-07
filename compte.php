<?php
session_start();
$titre="Connexion";
require('../header.php');
$enregistrer='admin/enregistrer.php';
    $i=0;
    while (!file_exists($enregistrer)) {
        if($i>10) {
            echo 'Impossible de trouver les fichiers de traitement chat';
            exit;
        }
         
        $enregistrer='../'.$enregistrer;
        $i++;
    }
?>
<main>
    <div class="box" id="compte">
        <form action="valid_compte.php" method="POST">
        <label for="mail">Adresse mail:</label>
        <input type="text" id="mail" name="mail" placeholder="Veuillez renseigner votre adresse mail">
        <label for="mdp">Mot de passe:</label>
        <input type="text" id="mdp" name="mdp" placeholder="Veuillez renseigner votre mot de passe">
        <p><a href="mdp_oubli.php">Mot de passe oublié -></p>
        <div id="compte2">
        <button type="submit" id="valid_compte">Valider</button>
        <h2><a href="<?php echo $enregistrer?>">Créer un compte</h2>
        </div>
        </form>
        <?php
        if (isset($_SESSION['connexion'])) {
        echo '<p>'.$_SESSION['connexion'].'</p>'."\n";
        unset($_SESSION['connexion']);
        }
        ?>
    </div>
</main>