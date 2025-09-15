<?php
// require "../connexion.php";

// require '../../includes/auth.php';
// requireLogin();

// if (!isClient()) {
//     header("Location: ../../public/login.php");
//     exit;
// }

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT d.*, a.titre, a.type FROM demandes d 
                       JOIN annonces a ON d.annonce_id = a.id 
                       WHERE d.utilisateur_id = ?");
$stmt->execute([$user_id]);
$demandes = $stmt->fetchAll();

// function ajouterDemande($utilisateur_id, $annonce_id, $type_demande) {
//     $pdo = getConnexion();
//     $sql = "INSERT INTO demandes (utilisateur_id, annonce_id, type_demande) VALUES (?, ?, ?)";
//     $stmt = $pdo->prepare($sql);
//     return $stmt->execute([$utilisateur_id, $annonce_id, $type_demande]);
// }

// function getDemandesParUtilisateur($utilisateur_id) {
//     $pdo = getConnexion();
//     $sql = "SELECT d.*, a.titre, a.description
//             FROM demandes d
//             JOIN annonces a ON d.annonce_id = a.id
//             WHERE d.utilisateur_id = ?
//             ORDER BY d.date_demande DESC";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$utilisateur_id]);
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
