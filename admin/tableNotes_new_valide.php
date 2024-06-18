<?php
session_start();
?>
<?php
$titre="Validation de l'ajout";
require('../base.php');
?>
<link rel="stylesheet" href="../style5.css">
<a href="tableNotes_gestion.php" class="gestion">Retour</a><br>
<?php

$erreurs = 0;
$affichage_erreur = "";

    if(isset($_POST['boutton_notes'])) {     
        
        if(!empty($_POST['note']) && ($_POST['note']) <=5 && ($_POST['note']) >=1) {
            $note = $_POST['note'];
        } else {
            $affichage_erreur .= "La note ne peut être vide et doit être comprise entre 1 et 5 !</br>";
            $erreurs++;
        }

        if(!empty($_POST['avis'])) {
            $avis = $_POST['avis'];
        }

        if(isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
            //vérification du format de l'image téléchargée
                $imageType=$_FILES["photo"]["type"];
                if ( ($imageType != "image/png") &&
                    ($imageType != "image/jpg") &&
                    ($imageType != "image/jpeg") ) {
                        echo '<p>Désolé, le type d\'image n\'est pas reconnu !</br>';
                        echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
                        die();
                }
        
                //creation d'un nouveau nom pour cette image téléchargée
                // pour éviter d'avoir 2 fichiers avec le même nom
                $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
        
    
                // dépot du fichier téléchargé dans le dossier /var/www/sae203/images
                if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                    if(!move_uploaded_file($_FILES["photo"]["tmp_name"], 
                    "../images/uploads_avis/".$nouvelleImage)) {
                        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
                        die();
                    }
                } else {
                    echo '<p>Problème : image non chargée...</p>'."\n";
                    die();
                }
            }
    

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
            $req_verif = $mabd->prepare("SELECT COUNT(*) FROM notes WHERE _id_jardins = :idjardins AND _id_compte = :idcompte");
            $req_verif->execute([':idjardins' => $idjardins,':idcompte' => $idcompte ]);
            $exists = $req_verif->fetchColumn();

            if($exists == 0) {
                if(empty($nouvelleImage)) {
                    $req = $mabd->prepare('INSERT INTO notes(`ajout_notes`, `ajout_avis`, `_id_jardins`, `_id_compte`) VALUES ('.$note.', "'.$avis.'", '.$idjardins.', '.$idcompte.')');
                }
                if (empty($avis)) {
                    $req = $mabd->prepare('INSERT INTO notes(`ajout_notes`, `photo_avis`, `_id_jardins`, `_id_compte`) VALUES ('.$note.', '.$photo.', '.$idjardins.', '.$idcompte.')');
                } 
                if (!empty($avis) && !empty($photo)) {
                    $req = $mabd->prepare('INSERT INTO notes(`ajout_notes`, `ajout_avis`, `photo_avis`, `_id_jardins`, `_id_compte`) VALUES ('.$note.', "'.$avis.'", '.$photo.', '.$idjardins.', '.$idcompte.')');
                }
                if (empty($avis) && empty($photo)) {
                    $req = $mabd->prepare('INSERT INTO notes(`ajout_notes`, `_id_jardins`, `_id_compte`) VALUES ('.$note.', '.$idjardins.', '.$idcompte.')');
                }
                $req->execute();
                echo "<h1>Vous venez d'ajouter une nouvelle note ! <a href='tableNotes_gestion.php'>Clique ici pour voir !</a></h1>";
            } else {
                $affichage_erreur .= "Ce jardin est déjà dans les notess de l'utilisateur, impossible de l'ajouter de nouveau.";
                echo "<h1>Il y a eu une ou plusieurs erreurs durant l'ajout : $affichage_erreur</h1>";
            }
        }
    }
    ?>