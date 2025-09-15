<!-- Fichier d'entrée principal de l'application -->
<!-- Ce fichier gère l'affichage de la page d'accueil, la récupération des annonces et le traitement des demandes -->
<?php
// session_start(); // Nécessaire pour accéder à $_SESSION

// require_once "../Model/annonces.php";
// require_once "../Model/demandes.php";
// include "../View/entete.php";

// // --- 1. Récupération des annonces
// $type_demande = $_GET['type_demande'] ?? '';

// if (!empty($type_demande)) {
//     $annonces = getAnnoncesParCritere($type_demande); // Corrige : type_bien ?
// } else {
//     $annonces = getAnnonces();
// }

// // --- 2. Récupération des annonces et demandes spécifiques à l'utilisateur connecté
// $mesDemandes = [];
// if (isset($_SESSION['utilisateur'])) {
//     $id = $_SESSION['utilisateur']['id'];
//     $mesDemandes = getDemandesParUtilisateur($id);
//     $mesAnnonces = getAnnoncesParUtilisateur($id);
// } else {
//     $mesAnnonces = getDernieresAnnonces();
// }

// --- 3. Traitement de la demande POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['annonce_id'], $_POST['type_demande'])) {
//     if (!isset($_SESSION['utilisateur'])) {
//         header("Location: login.php");
//         exit();
//     }

//     $annonce_id = intval($_POST['annonce_id']);
//     $type = $_POST['type_demande'];

//     if (in_array($type, ['achat', 'location'])) {
//         ajouterDemande($_SESSION['utilisateur']['id'], $annonce_id, $type);
//         header("Location: index.php?demande=ok");
//         exit();
//     }
// }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ImmoAgency - Accueil</title>
    <link rel="stylesheet" href="../../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <?php
        require 'entete.php';
    ?>
    <section class="relative w-full h-[500px]">
        <img src="../../publics/images/2_pamwilliams-smallfishingvillageautumncolorsblandfordns.jpg" class="w-full h-full object-cover" style="">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
            <h1 class="text-4xl font-bold">Trouvez votre Maison de Rêve</h1>
            <p class="mt-2">N'attendez plus pour chercher votre prochain nid douillet.</p>
            <a href="#recherche" class="inline-block mt-6 px-6 py-3 bg-blue-900 text-white rounded-full">Commencer</a>
        </div>
    </section>

    <!-- <section id="recherche" class="py-8 bg-blue-400 rounded-xl w-11/12 mx-auto -mt-12 shadow-lg flex justify-center gap-4 items-center" style="position: relative">
        <select name="type_annonce" class="px-4 py-2 rounded bg-blue-200">
            <option value="">Sélectionner un type d'annonce</option>
            <option value="vente">Vente</option>
            <option value="location">Location</option>
        </select>
        <button class="px-6 py-2 bg-blue-900 text-white rounded">Chercher</button>
    </section>  -->
</body>
</html>
<?php
include "affichage_annonces.php"; 
include "section_annonces_demandes.php";
include "pied.php";?>