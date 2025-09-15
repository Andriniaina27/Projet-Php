<?php 
require_once "../Public/retours.php"; 
require_once "../Model/retours.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ajouterRetour($_SESSION['utilisateur']['id'], $_POST['note'], $_POST['commentaire']);
    // La redirection est gérée dans ajouterRetour()
}