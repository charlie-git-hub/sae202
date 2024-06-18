<?php
session_start();
?>
<?php
$titre="Validation de la modification";
require('../base.php');
?>
<a href="tableNotes_gestion.php" class="gestion">Retour</a><br>
<?php

$num = $_POST['num'];
$erreurs = 0;
$affichage_erreur = "";

    if(isset($_POST['boutton_notes'])) {

        if(!empty($_POST['notes']) && ($_POST['notes'] <= 5)) {
            $notes = $_POST['notes'];
        } else {
            $affichage_erreur .= "La note envoyé est invalide !</br>";
            $erreurs++;
        }
        
        if(!empty($_POST['avis']) && strlen($_POST['avis']) >= 4) {
            $avis = $_POST['avis'];
        } else {
            $affichage_erreur .= "L'avis détaillé ne peut être vide ou inférieur à 4 caractères !</br>";
            $erreurs++;
        }
        
        if($_FILES["photo"]["name"]!=""){
            $imageType=$_FILES["photo"]["type"];
            if ( ($imageType != "image/wbep") &&
                ($imageType != "image/jpg") &&
                ($imageType != "image/jpeg") ) {
                    echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats WEBP et JPEG sont autorisés.</p>'."\n";
                    die();
            }

            $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
            
            // dépot du fichier téléchargé dans le dossier /var/www/r214/images/uploads
            if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads_avis/".$nouvelleImage)) {
                    echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
                    die();
                }
            } else {
                echo '<p>Problème : image non chargée...</p>'."\n";
                die();
            }
        }

        if(!empty($_POST['date'])) {
            $date = $_POST['date'];
        } else {
            $affichage_erreur .= "La date ne peut être vide !</br>";
            $erreurs++;
        }

        if(!empty($_POST['id_jardins'])) {
            $id_jardins = $_POST['id_jardins'];
        } else {
            $affichage_erreur .= "Le jardin sélectionné ne peut être vide !</br>";
            $erreurs++;
        }

        if(!empty($_POST['id_compte'])) {
            $id_compte = $_POST['id_compte'];
        } else {
            $affichage_erreur .= "Le compte sélectionné ne peut être vide !</br>";
            $erreurs++;
        }
        
        if($erreurs == 0){
            $req_verif = $mabd->prepare("SELECT COUNT(*) FROM notes WHERE _id_jardins = :idjardins AND _id_compte = :idcompte");
            $req_verif->execute([':idjardins' => $idjardins,':idcompte' => $idcompte ]);
            $exists = $req_verif->fetchColumn();

            if($exists == 0) {
                $req = "UPDATE notes SET `ajout_notes` = $notes, `ajout_avis` = '$avis', `photo_avis` = '$nouvelleImage', `date_avis` = '$date', `_id_jardins` = $id_jardins, `id_compte` = $id_compte WHERE id_notes = $num;";
                $resultat = $mabd->query($req);
                echo "<h1>Vous venez d'ajouter une nouvelle note ! <a href='tableNotes_gestion.php'>Clique ici pour voir !</a></h1>";
            } else {
                $affichage_erreur .= "Vous ne pouvez pas voter 2 fois le même jardin avec le même utilisateur, impossible de l'ajouter de nouveau.";
                echo "<h1>Il y a eu une ou plusieurs erreurs durant l'ajout : $affichage_erreur</h1>";
            }
        }
    }

    ?>