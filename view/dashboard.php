<?php
require 'header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <?php
                // require '../models/function.php';
            ?>
            <h3 class="mt-4 text-dark">Tableau de bord</h3>
            <div class="bar"></div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card b-right shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs text-primary text-uppercase mb-1 typo-medium">
                                        Annonces</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark-emphasis pop-bold"><?= getAnnonce()['titre'];?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-paperclip alert alert-primary fa-2x text-dark-emphasis"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs text-primary text-uppercase mb-1 typo-medium">
                                        Demande</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark-emphasis pop-bold"> <?= getDemande()['dmd'];?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list alert alert-success fa-2x text-dark-emphasis"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs text-primary text-uppercase mb-1 typo-medium">
                                        Contrat de location</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark-emphasis pop-bold"><?= getLocation()['loc'];?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user alert alert-warning fa-2x text-dark-emphasis"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs text-primary text-uppercase mb-1 typo-medium">
                                        Clients</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark-emphasis pop-bold"><?= getClient()['client'];?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-friends alert alert-info fa-2x text-dark-emphasis"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-1">
                    <div class="card shadow py-2">
                        <canvas id="annoncesChart"></canvas>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 mb-1">
                    <div class="card shadow mb-1">
                        <div class="card-header">
                            <h4>Commentaires Clients</h4>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleInterval" class="carousel slide"  data-bs-ride="carousel">
                                <div class="carousel-inner">
                                <?php
                                    require '../models/retours.php';
                                    foreach ($retours as $r):
                                ?>
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <div class="card mb-3" style="max-width: 500px;">
                                            <div class="row g-0">
                                                <div class="col-md-4 d-flex justify-content-center" style="align-items: center; background:#0D47A1;">
                                                    <div class="photo">
                                                        <span class="fa fa-user" style="font-size : 6rem; color:#FFFFFF;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"<?= $r['nom'] ?> (Note : <?= $r['note'] ?>)</h5>
                                                        <h5><?= $r['nom'] ?> (Note : <?= $r['note'] ?>/5)</h5>
                                                        <p class="card-text"><?= nl2br(htmlspecialchars($r['commentaire'])) ?></p>
                                                        <p class="card-text"><small class="text-body-secondary"><?= $r['date_creation'] ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                    <span class="fa fa-chevron-circle-left text-black" style="font-size: 2rem;" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                    <span class="fa fa-chevron-circle-right text-black" style="font-size: 2rem;" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12">
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
                                    <?php require '../models/liste_demande.php'?>
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
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
    require '../models/chart.php';
?>
<script>
    const ctx = document.getElementById('annoncesChart').getContext('2d');

    const moisNumeriques = <?= $data_mois ?>;
    const totaux = <?= $data_totaux ?>;

    const labels = moisNumeriques.map(m => {
        const nomsMois = ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Août", "Sep", "Oct", "Nov", "Déc"];
        return nomsMois[m - 1];
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: labels,
        datasets: [{
            label: 'Annonces ajoutées par mois',
            data: totaux,
            backgroundColor: '#0D47A1',
            borderRadius: 5,
        }]
        },
        options: {
        responsive: true,
        scales: {
            y: {
            beginAtZero: true,
            title: {
                display: true,
                text: 'Nombre d’annonces'
            }
            }
        }
        }
    });
</script>
<script src="../publics/js/graph.js"></script>
<?php
require "footer.php";
?>