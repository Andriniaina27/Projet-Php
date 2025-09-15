<?php
require_once 'connexion.php';


// Changer le statut d'une annonce
if (isset($_GET['indisponible'])) {
    $id = (int) $_GET['indisponible'];
    $db->prepare("UPDATE annonces SET statut = 'indisponible' WHERE id = ?")->execute([$id]);
}
     
    
$value = "SELECT * FROM annonces ORDER BY date_creation DESC";

$annonces = $db->query($value)->fetchAll();
?>