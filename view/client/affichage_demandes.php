<?php
session_start();
require_once "../Model/demandes.php";

if (!isset($_SESSION['utilisateur']['id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['annonce_id'])) {
    echo "ID d'annonce manquant.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type_demande = $_POST['type_demande'] ?? '';
    if (in_array($type_demande, ['achat', 'location'])) {
        $success = ajouterDemande($_SESSION['utilisateur']['id'], $_GET['annonce_id'], $type_demande);
        if ($success) {
            header("Location: ../View/affichage_demandes.php");
            exit();
        } else {
            $erreur = "Une erreur est survenue lors de l'enregistrement.";
        }
    } else {
        $erreur = "Veuillez choisir un type de demande valide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Faire une demande</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<?php include "../View/entete.php"; ?>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Faire une demande</h1>

    <?php if (isset($erreur)) : ?>
        <p class="text-red-600 mb-4"><?= $erreur ?></p>
    <?php endif; ?>

    <form method="POST">
        <label class="block mb-2 font-medium">Type de demande :</label>
        <select name="type_demande" required class="w-full border p-2 rounded mb-4">
            <option value="">-- Choisir --</option>
            <option value="achat">Achat</option>
            <option value="location">Location</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Envoyer la demande
        </button>
    </form>
</div>

<?php include "../View/pied.php"; ?>
</body>
</html>

<?php
session_start();
require_once "../Model/demandes.php";

if (!isset($_SESSION['utilisateur']['id'])) {
    header("Location: ../public/login.php");
    exit();
}

$demandes = getDemandesParUtilisateur($_SESSION['utilisateur']['id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes demandes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<?php include "entete.php"; ?>

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-blue-800 mb-6">Mes demandes envoyées</h1>

    <?php if (empty($demandes)) : ?>
        <p class="text-gray-600">Vous n’avez encore fait aucune demande.</p>
    <?php else : ?>
        <?php foreach ($demandes as $demande) : ?>
            <div class="mb-4 border-b pb-4">
                <h2 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($demande['titre']) ?> - <?= htmlspecialchars($demande['adresse']) ?></h2>
                <p class="text-sm text-gray-700 mt-1">Type : <strong><?= ucfirst($demande['type_demande']) ?></strong></p>
                <p class="text-sm text-gray-500">Statut : <span class="italic"><?= $demande['statut'] ?></span></p>
                <p class="text-xs text-gray-400">Envoyée le : <?= date("d/m/Y à H:i", strtotime($demande['date_demande'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include "pied.php"; ?>
</body>
</html>