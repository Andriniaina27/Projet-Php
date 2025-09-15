<?php
require_once 'connexion.php';
require_once '../includes/auth.php';
requireLogin();
if (!isAdmin()) exit;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['destinataire_id'];
    $contenu = htmlspecialchars($_POST['contenu']);
    $db->prepare("INSERT INTO messages (expediteur_id, destinataire_id, contenu) VALUES (?, ?, ?)")
        ->execute([$_SESSION['user_id'], $client_id, $contenu]);
    header("Location: ../view/message.php");
}

// $clients = $pdo->query("SELECT id, nom FROM utilisateurs WHERE role = 'client'")->fetchAll();
?>