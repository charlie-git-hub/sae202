<?php
include('conf.inc.php');

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $db->prepare('SELECT COUNT(*) FROM jardins WHERE id = ?');
    $stmt->execute([$id]);
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
