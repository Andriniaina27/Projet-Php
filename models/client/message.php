<?php
// require_once '../config/db.php';
// require_once '../includes/auth.php';
// requireLogin();

// if (!isClient()) {
//     header("Location: ../public/login.php");
//     exit;
// }

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT m.*, u.nom AS nom_admin FROM messages m 
                       JOIN utilisateurs u ON m.expediteur_id = u.id 
                       WHERE m.destinataire_id = ?
                       ORDER BY m.date_envoi DESC");
$stmt->execute([$user_id]);
$messages = $stmt->fetchAll();
?>