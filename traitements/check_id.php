<?php
// Connexion à la base de données
include('conf.inc.php');

try {
    // Créer une nouvelle connexion PDO à la base de données
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    // Définir le mode d'erreur PDO sur Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo 'Erreur : ' . $e->getMessage();
}

// Vérification de l'existence de l'ID
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    // Préparation de la requête avec la variable de connexion
    $stmt = $db->prepare('SELECT COUNT(*) FROM jardins WHERE id = ?');
    // Exécution de la requête avec le paramètre sécurisé
    $stmt->execute([$id]);
    // Récupération du résultat
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo 'exists';
    } else {
        echo 'available';
    }
} else {
    echo 'error';
}
?>
