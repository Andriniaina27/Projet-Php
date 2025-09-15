
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel avec Cards - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Carousel avec des Cards</h2>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Image 1">
                            <div class="card-body">
                                <h5 class="card-title">Titre 1</h5>
                                <p class="card-text">Description de la première carte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Image 2">
                            <div class="card-body">
                                <h5 class="card-title">Titre 2</h5>
                                <p class="card-text">Description de la deuxième carte.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Image 3">
                            <div class="card-body">
                                <h5 class="card-title">Titre 3</h5>
                                <p class="card-text">Description de la troisième carte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Image 4">
                            <div class="card-body">
                                <h5 class="card-title">Titre 4</h5>
                                <p class="card-text">Description de la quatrième carte.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Boutons de navigation -->
        <button class="carousel-control-prev btn btn-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next btn btn-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>