<?php
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../../publics/login.php");
        exit();
    }
    
    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
    
    function isAdmin() {
        return isLoggedIn() && $_SESSION['role'] === 'admin';
    }
    
    function isClient() {
        return isLoggedIn() && $_SESSION['role'] === 'client';
    }
    
    function requireLogin() {
        if (!isLoggedIn()) {
            header("Location: ../public/login.php");
            exit;
        }
    }
    require ('../../models/connexion.php');
    function getUser(){
        $stmt = $GLOBALS['db']->prepare("SELECT nom AS user FROM utilisateurs WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch();
    }
//  require_once "../Model/utilisateurs.php"; 
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../publics/FontAwesome/css/all.css">
    <script src="../../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<style>
    *{
        text-decoration: none;
        list-style: none;
    }
    #popup {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    .close-btn {
        background: none;
        border: none;
        cursor: pointer;
    }
    a{
        text-decoration: none;
        list-style: none;
        color: black;  
    }
    a:hover{
        text-decoration: none;
        list-style: none;
        color: #007bff;
    }
</style>
</head>
<header class="w-full bg-white shadow-md p-4 flex justify-between items-center">
    <h4>Immo<span class="font-bold" style="color: #007bff;">Agency</span></h4>
    <nav class="space-x-6">
        <a href="#" class="text-bold">Home</a>
        <a href="index.php#section-annonces" class="hover:text-blue-400">Annonces</a>
        <a href="index.php#section-annonces" class="hover:text-blue-400" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Message</a>
        <a class="hover:text-blue-400" onclick="openPopup()" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Donner une note</a>
        <a href="../../models/logout.php" class="font-bold">Deconnexion <i class="fas fa-sign-out"></i> </a>
        <a href="" class="font-bold"><?= getUser()['user']?> <i class="fas fa-user"></i> 
        <?php
            // require '../../models/client/function.php';
        ?>
        <?php
        // getUser()['user']
        ?>
        </a>
    </nav>
</header>
    <!-- POPUP DE NOTATION -->
    <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative animate-fade-in">
        <button onclick="closePopup()" class="close-btn absolute top-2 right-4 text-gray-400 hover:text-red-500 text-xl">&times;</button>
        <h2 class="text-xl font-semibold mb-4 text-center">Donner une note à l'agence</h2>
        <form method="post" action="../../models/client/retours.php">
            <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Note</label>
            <select name="note" id="note" class="w-full p-2 mb-4 rounded border border-gray-300">
                <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                <option value="4">⭐️⭐️⭐️⭐️</option>
                <option value="3">⭐️⭐️⭐️</option>
                <option value="2">⭐️⭐️</option>
                <option value="1">⭐️</option>
            </select
            <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Commentaire</label>
            <textarea name="commentaire" id="commentaire" rows="3" class="w-full p-2 rounded border border-gray-300 mb-4" placeholder="Votre avis..."></textarea>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Envoyer</button>
        </form>
    </div>
</div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php
            require '../../models/client/message.php';
            foreach ($messages as $m): 
        ?>
        <p><strong>De :</strong> <?= htmlspecialchars($m['nom_admin']) ?></p>
        <div class=" rounded-xl shadow" style="background: #0D47A1; padding:5px">
            <p class="text-white"><?= nl2br(htmlspecialchars($m['contenu'])) ?></p>
        </div>
        <p><small><?= $m['date_envoi'] ?></small></p>
        <?php
            endforeach; 
        ?>
        </div>
        
        </div>
    </div>
    </div>
<script>
    function openPopup() {
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script>
