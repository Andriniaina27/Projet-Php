<?php
require_once "connexion.php";

function verifierConnexion($email, $mot_de_passe) {
    $pdo = getConnexion();
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        return $utilisateur;
    }
    return false;
}
function ajouterUtilisateur($nom, $email, $mot_de_passe) {
    $pdo = getConnexion();
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $mot_de_passe_hash]);
}

?>
