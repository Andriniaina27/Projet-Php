<?php
require_once '../models/login.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'authentification</title>
    <link href="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../publics/css/style.css">
    <link rel="stylesheet" href="../publics/FontAwesome/css/all.css">
</head>

<body class="body">
    <div class="login-container">
        <div class="left-section flex-column">
            <div>
                <h2 class="text-primary">ImmoAgency</h2>
                <p>Agence Immobilière</p>
            </div>
        </div>

        <div class="right-section">
            <h3 class="text-center mb-4">Page d'authentification</h3>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Adresse email</label>
                    <input type="email" name="email" class="form-control" placeholder="Adresse email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="register.php" class="text-center text-white">S'inscrire</a>
                <?= $erreur ?>
            </form>
        </div>
    </div>
    <script src="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>