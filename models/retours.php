<?php
require_once 'connexion.php';
// require_once '../includes/auth.php';
// requireLogin();
// if (!isAdmin()) exit;

$retours = $db->query("SELECT r.*, u.nom FROM retours_clients r 
    JOIN utilisateurs u ON r.utilisateur_id = u.id 
    ORDER BY date_creation DESC")->fetchAll();
?>