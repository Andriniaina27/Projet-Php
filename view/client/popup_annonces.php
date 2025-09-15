<?php
require_once "../Model/annonces.php";
require_once "../Model/images.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $annonce = getAnnonceParId($id);
    $images = getImagesParAnnonceId($id);

    if ($annonce):
?>
    <h2 class="text-2xl font-bold text-blue-800 mb-4"><?= htmlspecialchars($annonce['titre']) ?></h2>
    <div class="flex gap-3 overflow-x-auto mb-4">
        <?php foreach ($images as $img): ?>
            <img src="image/<?= $img['nom_fichier'] ?>" class="h-40 rounded shadow">
        <?php endforeach; ?>
    </div>
    <p><strong>Bien :</strong> <?= $annonce['type'] ?></p>
    <p><strong>Prix :</strong> <?= number_format($annonce['prix'], 0, ',', ' ') ?> FCFA</p>
    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($annonce['description'])) ?></p>
    <p><strong>Date :</strong> <?= date('d/m/Y', strtotime($annonce['date_creation'])) ?></p>
<?php
    else:
        echo "<p class='text-red-500'>Annonce introuvable.</p>";
    endif;
}
?>