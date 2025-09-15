<?php

    
// require '../../includes/auth.php';
// requireLogin();

// if (!isClient()) {
//     header("Location: ../public/login.php");
//     exit;
// }

// function getAnnonces() {
//     $pdo = getConnexion();
//     $req = $pdo->query("SELECT * FROM annonces LIMIT 6");
//     return $req->fetchAll(PDO::FETCH_ASSOC);
// }
// function getDernieresAnnonces($limite = 3) {
//     $pdo = getConnexion();
//     $sql = "SELECT * FROM annonces ORDER BY date_creation DESC LIMIT ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(1, $limite, PDO::PARAM_INT);
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
// function getAnnoncesParUtilisateur($utilisateur_id) {
//     $pdo = getConnexion();
//     $sql = "SELECT * FROM annonces WHERE utilisateur_id = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$utilisateur_id]);
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
// function getAnnonceParId($id) {
//     $pdo = getConnexion();
//     $sql = "SELECT * FROM annonces WHERE id = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$id]);
//     return $stmt->fetch(PDO::FETCH_ASSOC);
// }
// function isLoggedIn() {
//     return isset($_SESSION['user_id']);
// }

// function isAdmin() {
//     return isLoggedIn() && $_SESSION['role'] === 'admin';
// }

// function isClient() {
//     return isLoggedIn() && $_SESSION['role'] === 'client';
// }

// function requireLogin() {
//     if (!isLoggedIn()) {
//         header("Location: ../public/login.php");
//         exit;
//     }
// }
require '../connexion.php';
require_once '../../includes/auth.php';
requireLogin();
// require '../../view/client/index.php'

// $message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $annonce_id = (int) $_POST['annonce_id'];
    $type_demande = $_POST['type_demande'];
    $utilisateur_id = $_SESSION['user_id'];

    // Vérifier si la demande n’existe pas déjà
    $check = $db->prepare("SELECT * FROM demandes WHERE utilisateur_id = ? AND annonce_id = ?");
    $check->execute([$utilisateur_id, $annonce_id]);

    if ($check->rowCount() === 0) {
        $stmt = $db->prepare("INSERT INTO demandes (utilisateur_id, annonce_id, type_demande) VALUES (?, ?, ?)");
        $stmt->execute([$utilisateur_id, $annonce_id, $type_demande]);
        $message = "<p class='alert alert-success mt-2 text-success' style='font-weight: bold;'>Demande envoyée avec succès.</p>";
        header("Location: ../../view/client/index.php");
    } else {
        echo "<script>
                    alert('Vous avez déjà fait une demande pour cette annonce.');
                    window.location.href = '../../view/client/index.php';
                </script>";
        // header("Location: ../../view/client/index.php");
        // $message = "<p class='alert alert-danger mt-2 text-danger' style='font-weight: bold;'>Vous avez déjà fait une demande pour cette annonce.</p>";
    }
}
// header("Location: ../../view/client/index.php");
?>
<!-- <script>alert("Vous avez déjà fait une demande pour cette annonce.")</script> -->