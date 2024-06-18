<?php
session_start();
require("../base.php");
$affichage_erreur ="";
$affichage_retour ="";
$errors=0;
$id_jardins=$_POST['id_jardins'];
$id_compte=$_SESSION['id'];

        if(empty($_POST['note'])) {
            $affichage_erreur .= "Votre note ne peut être inférieur à 1 étoile.</br>";
            $errors++;
        } else {
            $note = $_POST['note'];
        }
        
        if(empty($_POST['avis'])) {
            $affichage_erreur .= "Votre avis détaillé ne peut être vide.";
            $errors++;
        } elseif (strlen($_POST['avis']) < 5){
            $affichage_erreur .= "Votre avis doit comporter au moins 5 caractères.</br>";
            $errors++;
        } else {
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
        
        $date = date("Y_m_d");
        
        // Construction de la requête avec les valeurs conditionnelles
        if ($errors == 0){
            if (isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0) {
                $req = 'INSERT INTO notes (ajout_notes, ajout_avis, date_avis, photo_avis, `_id_jardins`, `_id_compte`) VALUES (' . $note . ',"' . $avis . '","' . $date . '","' . $nouvelleImage . '",' . $id_jardins . ',' . $id_compte . ')';
            } else {
                $req = 'INSERT INTO notes (ajout_notes, ajout_avis, date_avis, `_id_jardins`, `_id_compte`) VALUES (' . $note . ',"' . $avis . '","' . $date . '",' . $id_jardins . ',' . $id_compte . ')';
            }
        }            

if ($errors == 0) {    
    $affichage_retour='<div class="reponseV">';
    $affichage_retour.='<p class="valide">Votre avis a bien été déposé !</p>';
    $affichage_retour.='</div>';
} elseif ($errors == 1) {
    $affichage_retour='<div class="reponseF">';
    $affichage_retour.="<p class='valide'>Voici l'erreur lors du dépôt de votre avis:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
} else {
    $affichage_retour='<div class="reponseF">';
    $affichage_retour.="<p class='valide'>Voici les erreurs lors du dépôt de votre avis:<br> $affichage_erreur</p>";
    $affichage_retour.='</div>';
}
 
        // Exécution de la requête
    if($errors == 0){
        $resultat = $mabd->query($req);
    }
    
$_SESSION['avis']=$affichage_retour;
header('location: ../user/avis.php?id='.$id_jardins.'');
?>