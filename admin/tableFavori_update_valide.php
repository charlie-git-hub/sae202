<?php
session_start();
?>
<?php
$titre="Validation de la modification";
require('../base.php');
?>
<a href="tableFavori_gestion.php" class="gestion">Retour</a><br>
<link rel="stylesheet" href="../style5.css">
<style>
    .message {
        text-align: center;
        margin-bottom: 20px;
    }
    .message h1 {
        font-size: 24px;
        color: #007bff; /* Bleu */
    }
    .message a {
        color: #28a745; /* Vert */
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
    }
    .message a:hover {  
        text-decoration: underline;
    }
    .erreur {
        color: #dc3545; /* Rouge */
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }
</style>
<?php

$num = $_POST['num'];
$erreurs = 0;
$affichage_erreur = "";

    if(isset($_POST['boutton_favori'])) {
        
        if(isset($_POST['id_jardins']) && !empty($_POST['id_jardins'])) {
            $id_jardins = $_POST['id_jardins'];
        } else {
            $affichage_erreur .= "La sélection du jardin ne peut être vide !</br>";
            $erreurs++;
        }
        
        if(isset($_POST['id_compte']) && !empty($_POST['id_compte'])) {
            $id_compte = $_POST['id_compte'];
        } else {
            $affichage_erreur .= "La sélection du favori ne peut être vide !";
            $erreurs++;
        }
        
        if($erreurs == 0){
            $req_verif = $mabd->prepare("SELECT COUNT(*) FROM favori WHERE _id_jardins = :idjardins AND _id_compte = :idcompte");
            $req_verif->execute([':idjardins' => $id_jardins,':idcompte' => $id_compte ]);
            $exists = $req_verif->fetchColumn();

            if($exists == 0) {
                $req = "UPDATE favori SET `_id_jardins` = $id_jardins, `_id_compte` = $id_compte WHERE id_favori = $num;";
                $resultat = $mabd->query($req);
                echo "<h1>Vous venez de modifier un favori ! <a href='tableFavori_gestion.php'>Clique ici pour voir !</a></h1>";
            } else {
                $affichage_erreur .= "Ce jardin est déjà dans les favoris de l'utilisateur, impossible de l'ajouter de nouveau.";
                $affichage_erreur .= "<h1>Il y a eu une ou plusieurs erreurs durant l'ajout : $affichage_erreur</h1>";
            }
        }
    }

$affichage_retour = $affichage_erreur;

echo $affichage_retour;

?>