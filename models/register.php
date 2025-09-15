<?php
require_once 'connexion.php';
session_start();

    $erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $stmt = $db->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $erreur = "<p class='mt-4 alert alert-danger text-center text-danger' style='font-weight: bold;'>Email déjà utilisé.</p>";
    } else {
        // Inscrire l'utilisateur en tant que client
        $stmt = $db->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES (?, ?, ?, 'client')");
        if ($stmt->execute([$nom, $email, $mot_de_passe])) {
            $_SESSION['user_id'] = $db->lastInsertId();
            $_SESSION['role'] = 'client';
            header('Location: ../view/client/index.php');
            exit;
        } else {
            $erreur = "<p class='mt-4 alert alert-danger text-center text-danger' style='font-weight: bold;'>Erreur lors de l'inscription.</p>";
        }
    }
}
?>