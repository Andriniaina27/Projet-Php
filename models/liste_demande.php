<?php
require_once 'connexion.php';


if (isset($_GET['valider'])) {
    $id = (int) $_GET['valider'];

    $demande = $db->prepare("SELECT * FROM demandes WHERE id = ?");
    $demande->execute([$id]);
    $d = $demande->fetch();

    if ($d['type_demande'] === 'location') {
        $db->prepare("INSERT INTO contrats_location (utilisateur_id, annonce_id, date_debut, duree_mois) VALUES (?, ?, CURDATE(), 12)")
            ->execute([$d['utilisateur_id'], $d['annonce_id']]);
        $contrat_id = $db->lastInsertId();
        $db->prepare("UPDATE demandes SET statut = 'validée', contrat_id = ? WHERE id = ?")->execute([$contrat_id, $id]);
        $db->prepare("UPDATE annonces SET statut = 'indisponible' WHERE id = ?")->execute([$d['annonce_id']]);
    } else {
        $db->prepare("UPDATE demandes SET statut = 'validée' WHERE id = ?")->execute([$id]);
        $db->prepare("UPDATE annonces SET statut = 'indisponible' WHERE id = ?")->execute([$d['annonce_id']]);
    }   
} elseif (isset($_GET['refuser'])) {
    $id = (int) $_GET['refuser'];
    $db->prepare("UPDATE demandes SET statut = 'refusée' WHERE id = ?")->execute([$id]);
}

$demandes = $db->query("SELECT d.*, u.nom, a.titre FROM demandes d 
    JOIN utilisateurs u ON d.utilisateur_id = u.id 
    JOIN annonces a ON d.annonce_id = a.id 
    WHERE d.statut = 'en attente'")->fetchAll();
?>