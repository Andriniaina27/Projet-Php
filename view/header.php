<?php
    require '../models/login.php';
    // require '../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../publics/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../publics/css/style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-light shadow p-2 align-items-center">
        <a class="navbar-brand text-dark" href="dashboard.php">Immo<span class="text-primary bold typo-bold">Agency</span></a>
        <div class="bg-admin d-flex align-items-center">
            <div class="container-fluid d-flex ">
                <li class="nav-item bg-light b-radius dropdown no-arrow align-items-center">
                    <a class="nav-link d-flex align-items-center justify-content-between typo-medium" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h5 class="text-dark-emphasis" style="font-weight: bold;">
                        <?php
                            require '../models/function.php';
                        ?>
                        <?= getUser()['user']?>
                        
                            <i class="fa fa-user-circle text-dark-emphasis" style="font-size: 1.5rem;"></i>
                        </h5>
                    </a>
                </li>
            </div>
                <button class="btn btn-primary dropdown-toggle drop" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fa fa-bars text-light"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end drop-menu">
                    <li class="d-flex">
                        <a class="dropdown-item" href="dashboard.php">
                            <span class="fa fa-home text-dark"></span>
                            Acceuil
                        </a>
                    </li>
                    <hr>
                    <li class="d-flex">
                        <a class="dropdown-item" href="location.php">
                            <span class="fa fa-user-friends text-dark"></span>
                                Locations
                        </a>
                    </li>
                    <li class="d-flex">
                        <a class="dropdown-item" href="liste_annonce.php">
                            <span class="fa fa-paperclip text-dark"></span>
                            Annonces
                        </a>
                    </li>
                    <li class="d-flex">
                        <a class="dropdown-item" href="liste_utilisateur.php">
                            <span class="fa fa-user text-dark"></span>
                            Utilisateurs
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item position-relative" href="message.php">
                            <span class="fa fa-envelope text-dark"></span>
                            Message
                            
                    </span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                            <span class="fa fa-sign-out-alt text-dark" ></span>
                            Se déconnecter
                        </a>
                    </li>
                </ul>
        </div>
    </nav>