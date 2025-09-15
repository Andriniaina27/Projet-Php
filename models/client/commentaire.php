<?php
// require "../connexion.php";

// require '../../includes/auth.php';
// requireLogin();

// if (!isClient()) {
//     header("Location: ../../public/login.php");
//     exit;
// }

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT * FROM retours_clients WHERE utilisateur_id = ?");
$stmt->execute([$user_id]);
$retours = $stmt->fetchAll();