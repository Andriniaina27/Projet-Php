<?php
    require 'header.php';
    require '../models/liste_annonce.php'
?>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  
  
  <div class="carousel-inner">
<?php foreach ($annonces as $a): ?>
    <div class="carousel-item active">
      <img src="../publics/images/<?= $a['img'] ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?= $a['titre'] ?> (<?= $a['type'] ?>)</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
  <button class="carousel-control-prev text-dark" type="button" style="font-size : 3rem" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="fa fa-chevron-circle-left" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next text-dark" type="button" style="font-size : 3rem" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php
    require 'footer.php';
?>