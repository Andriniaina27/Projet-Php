<?php
include 'connexion.php';
include '../includes/auth.php';
include '../models/update.php';
requireLogin();
if (!isAdmin()) exit;
        // $prix = $_POST['prix'];
        $titre = $description = $type = $prix = $img = "";
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $prix = $_POST['prix'];
        $type = $_POST['type'];
        $img = $_POST['images'];
        $id = $_POST['id_an'];
        $requete = $db->prepare("UPDATE annonces SET titre = ?, description = ?, prix = ?, type = ?, img = ? WHERE id = ?");
        $requete->execute([$titre, $description, $prix, $type, $img, $id]);
        header("Location: ../view/liste_annonce.php");
    }else{
        echo "Echec ";
    }
?>