<?php
require 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        require '../models/liste_demande.php'
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4 ">
            <div class="container-fluid p-top">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="">Liste des demandes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Nom Client</th>
                                    <th>Annonce</th>
                                    <th>Type de demande</th>
                                    <th>Date de demande</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php foreach ($demandes as $d): ?>
                                    <tr>
                                        <td><?= $d['nom'] ?></td>
                                        <td><?= $d['titre'] ?></td>
                                        <td><?= $d['type_demande'] ?></td>
                                        <td><?= $d['date_demande'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href="?valider=<?= $d['id'] ?>"><span class="fa fa-check"></span></a> | 
                                            <a class="btn btn-danger" href="?refuser=<?= $d['id'] ?>"><span class="fa fa-times"></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
require "footer.php";
?>