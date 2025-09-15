<?php
require 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        require '../models/location.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4 ">
            <div class="container-fluid p-top">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="">Liste des Locations</h4>
                    </div>
                    <div class="card-body" style="max-height: 75vh; overflow : scroll;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Date début</th>
                                    <th>Durée</th>
                                    <th>Renouvelable</th>
                                    <th>Statut</th>
                                </thead>
                                <tbody>
                                <?php foreach ($contrats as $c): ?>
                                    <tr>
                                        <td><?= $c['nom'] ?></td>
                                        <td><?= $c['titre'] ?></td>
                                        <td><?= $c['date_debut'] ?></td>
                                        <td><?= $c['duree_mois'] ?></td>
                                        <td><?= $c['renouvelable'] ? 'Oui' : 'Non' ?></td>
                                        <td><?= $c['statut'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
require "footer.php";
?>                  