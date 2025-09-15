<?php
require_once 'connexion.php';
session_start();
$erreur = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php');
        exit;
    } else {
       $erreur =  " <p class='mt-4 alert alert-danger text-center text-danger' style='font-weight: bold;'>Identifiants incorrects.</p>";
        
    }
}

?>