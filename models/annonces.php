<?php
require_once 'connexion.php';
require_once '../includes/auth.php';
requireLogin();
if (!isAdmin()) exit;
$error = "";
$success = false;
// Ajouter une annonce
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $prix = $_POST['prix'];
    $type = $_POST['type'];
    $img = $_POST['images'];
    $success = true;
    if(empty($titre) || empty($description) || empty($prix) || empty($img)){
        header("Location: ../view/annonce.php");
        $error = "<p class='alert alert-danger'>Remplir le(s) champ(s) vide(nt)</p>";
        $success = false;
    }else{
        $stmt = $db->prepare("INSERT INTO annonces (titre, description, prix, type, utilisateur_id, date_creation, img) VALUES (?, ?, ?, ?, ?, CURDATE(), ?)");
        $stmt->execute([$titre, $description, $prix, $type, $_SESSION['user_id'], $img]);
        header("Location: ../view/liste_annonce.php");
        $message = "Annonce publiée !";
    }
    
}