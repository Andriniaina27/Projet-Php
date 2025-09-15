<?php
require 'header.php';
require '../models/liste_annonce.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="container-fluid p-top">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="">Liste des Annonces</h4>
                        <a href="annonce.php" class="btn btn-success"><span class="fa fa-plus-circle"></span></a>
                    </div>
                    <div class="card-body" style="max-height: 75vh; overflow : scroll;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Images</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php foreach ($annonces as $a): ?>
                                    <tr class="align-items-center">
                                        <td><img src="../publics/images/<?= $a['img'] ?> " class="img-db" alt="..." style="height: 5rem;"></td>
                                        <td><?= $a['titre'] ?> (<?= $a['type'] ?>)</td>
                                        <td><?= $a['description'] ?></td>
                                        <td><?= $a['prix'] ?> Ar</td>
                                        <td><?= $a['statut'] ?> –</td>
                                        <td width=250>
                                            <?php if ($a['statut'] === 'disponible'): ?>
                                                <a href="?indisponible=<?= $a['id'] ?>" class="btn btn-warning"><span class="">Marquer comme Indisponible</span></a>
                                            <?php endif; ?>
                                            <a href="updateAnnonce.php?id=<?= $a['id'] ?>" class="btn btn-info text-white"><span class="fa fa-pen"></span></a>
                                            <a href="../models/deleteAnnonce.php?id=<?= $a['id'] ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                        </td>
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