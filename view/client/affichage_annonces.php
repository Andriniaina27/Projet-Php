<?php

require_once "../../models/client/annonces.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="text-center mt-10" style="background:whitesmoke; overflow:scroll; max-height:100vh">
    <h2 class="text-xl font-bold mb-6">Votre future propriétés</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">

    <!-- Boucle pour afficher les annonces -->
        <?php
         foreach ($annonces as $a): 
         ?>
        <div class="bg-[#93C5FD] rounded-2xl p-4 shadow-xl">
            <img src="../../publics/images/<?= $a['img']?>" alt="Maison" class="rounded-xl mb-3" style="height: 15rem;width:100%; object-fit:cover">
            <h3 class="text-md font-bold"><?= $a['titre']?></h3>
            <p class="text-sm"><?= $a['description']?></p>
            <p class="text-blue-900 font-semibold"><?= $a['prix']?> Ariary</p>
            <!-- <button class="mt-3 px-4 py-2 bg-blue-900 text-white rounded-full">Faire une demande</button> -->
            <!-- Dans ta boucle foreach des annonces -->
            <form method="post" action="../../models/client/ajoutAnnonces.php">
                <input type="hidden" name="annonce_id" value="<?= $a['id'] ?>">
                <input type="hidden" name="type_demande" value="<?= $a['type'] ?>">
                <button type="submit" class="voir-plus-btn bg-blue-700 text-white px-4 py-1 rounded mt-2">Faire une demande de <?= $a['type'] ?></button>
            </form>
    
        </div>
        <?php 
            endforeach; 
        ?>
    </div>
</div>
</body>
</html>