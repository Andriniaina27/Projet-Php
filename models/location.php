<?php
require_once 'connexion.php';
// require_once '../includes/auth.php';
// requireLogin();
// if (!isAdmin()) exit;

$contrats = $db->query("SELECT c.*, u.nom, a.titre FROM contrats_location c 
    JOIN utilisateurs u ON c.utilisateur_id = u.id 
    JOIN annonces a ON c.annonce_id = a.id 
    ORDER BY c.date_creation DESC")->fetchAll();
?>