<?php
session_start();
?>
<?php
$titre="Validation de l'ajout";
?>
<a href="tableFavori_gestion.php" class="gestion">Retour</a><br>
<?php

$erreurs = 0;
$affichage_erreur = "";

    if(isset($_POST['boutton_favori'])) {

        require('../base.php');
        $req = "INSERT INTO favori(`_id_jardins`, `_id_compte`) VALUES ";
        
        if(isset($_POST['id_jardins']) && !empty($_POST['id_jardins'])) {
            $idjardins = $_POST['id_jardins'];
        } else {
            $affichage_erreur .= "La sélection du jardin ne peut être vide !</br>";
            $erreurs++;
        }
        
        if(isset($_POST['id_compte']) && !empty($_POST['id_compte'])) {
            $idcompte = $_POST['id_compte'];
        } else {
            $affichage_erreur .= "La sélection du compte ne peut être vide !";
            $erreurs++;
        }
        
        if($erreurs == 0){
            $req_verif = $mabd->prepare("SELECT COUNT(*) FROM favori WHERE _id_jardins = :idjardins AND _id_compte = :idcompte");
            $req_verif->execute([':idjardins' => $idjardins,':idcompte' => $idcompte ]);
            $exists = $req_verif->fetchColumn();

            if($exists == 0) {
                // Insérez le nouveau favori
                $req = $mabd->prepare("INSERT INTO favori(`_id_jardins`, `_id_compte`) VALUES (:idjardins, :idcompte)");
                $req->execute([':idjardins' => $idjardins,':idcompte' => $idcompte ]);
                echo "<h1>Vous venez d'ajouter un nouveau favori ! <a href='tableFavori_gestion.php'>Clique ici pour voir !</a></h1>";
            } else {
                $affichage_erreur .= "Ce jardin est déjà dans les favoris de l'utilisateur, impossible de l'ajouter de nouveau.";
                echo "<h1>Il y a eu une ou plusieurs erreurs durant l'ajout : $affichage_erreur</h1>";
            }
        }
    }
    ?>