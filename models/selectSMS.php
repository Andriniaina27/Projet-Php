<?php
require_once 'connexion.php';

$clients = $db->query("SELECT id, nom FROM utilisateurs WHERE role = 'client'")->fetchAll();


$stmt = $db->query("SELECT m.*, u.nom AS nom_client FROM messages m 
                       JOIN utilisateurs u ON m.destinataire_id = u.id
                       ORDER BY m.date_envoi DESC");
$messages = $stmt->fetchAll();
// $message = $db->query("SELECT id, nom FROM utilisateurs WHERE role = 'client'")->fetchAll();

?>