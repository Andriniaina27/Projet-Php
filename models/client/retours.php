<?php
require_once '../connexion.php';
require_once '../../includes/auth.php';
requireLogin();

if (!isClient()) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $note = (int) $_POST['note'];
    $user_id = $_SESSION['user_id'];

    $stmt = $db->prepare("INSERT INTO retours_clients (utilisateur_id, commentaire, note) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $commentaire, $note]);
    $message = "Merci pour votre retour !";
    header("Location: ../../view/client/index.php");
}
?>
?>