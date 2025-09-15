<?php
// require '../connexion.php';
// require_once '../../includes/auth.php';
// requireLogin();

// if (!isClient()) {
//     header("Location: ../../public/login.php");
//     exit;
// }

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT c.*, a.titre FROM contrats_location c 
                       JOIN annonces a ON c.annonce_id = a.id 
                       WHERE c.utilisateur_id = ?");
$stmt->execute([$user_id]);
$contrats = $stmt->fetchAll();
?>