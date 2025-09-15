<!-- <?php
//  require '../../models/client/annonces.php';
?> -->
<div class="w-11/12 mx-auto mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Bloc Mes Demandes -->
    
    <div class="bg-[#93C5FD] rounded-xl p-6 shadow-md">
        <h2 class="text-xl font-bold mb-4">Mes Demandes</h2>
        <?php
        require '../../models/client/demandes.php';
            foreach ($demandes as $d): 
        ?>
            <div class="mb-4 p-4 bg-white rounded-xl shadow">
                <p class="font-semibold"><?= htmlspecialchars($d['titre']) ?> (<?= $d['type_demande'] ?>)</p>
                <p class="text-sm text-gray-600">Status : <strong><?= $d['statut'] ?></strong></p>
                <?php if ($d['statut'] === 'validée' && $d['type_demande'] === 'location' && $d['contrat_id']): ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Voir contrat</button>
                <?php endif; ?>
                <!-- <p class="text-blue-900 font-bold"> </p> -->
            </div>
            
        <?php
            endforeach;
            require '../../models/client/contrat.php';
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Contrat de Location</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php foreach ($contrats as $c): ?>
                    <div class="modal-body">
                        <p><strong><?= htmlspecialchars($c['titre']) ?></strong></p>
                        <p>Date de début : <?= $c['date_debut'] ?></p>
                        <p>Durée : <?= $c['duree_mois'] ?> mois</p>
                        <p>Renouvelable : <?= $c['renouvelable'] ? 'Oui' : 'Non' ?></p>
                        <p>Statut : <strong><?= $c['statut'] ?></strong></p>
                    </div>
                    <?php endforeach; ?>
                    
                    </div>
                </div>
            </div>
    </div>

    <!-- Bloc Mes Commentaires -->
    
    <div class="bg-[#E9D5FF] rounded-xl p-6 shadow-md">
        <h2 class="text-xl font-bold mb-4">Mes Commentaires</h2>
        <?php
            require '../../models/client/commentaire.php';
            foreach ($retours as $r): 
        ?>
        <div class="mb-4 p-4 bg-white rounded-xl shadow">
            <p class="font-semibold">Note :(<?= $r['note']?>/5) | <?= $r['date_creation']?></p>
            <p class="text-blue-900 font-bold"><?= $r['commentaire']?></p>
        </div>
        <?php
            endforeach; 
        ?>
     
    </div>
</div>