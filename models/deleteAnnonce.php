<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $matricule = $db->prepare("DELETE FROM annonces WHERE id = ?");
    $matricule->execute([$id]);

    // echo "Utilisateur supprimé avec succès!";

    header('Location: ../view/liste_annonce.php');
}else{
    echo "Erreur de suppression!";
}