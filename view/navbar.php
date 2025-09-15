<nav class="col-md-2 d-none p-top d-md-block bg-light shadow sidebar side" style="height: 100vh;">
   <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-dark" href="dashboard.php">
                    <span class="fa fa-home text-dark"></span>
                    Acceuil
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link active text-dark" href="location.php">
                    <span class="fa fa-user-friends text-dark"></span>
                    Locations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="liste_annonce.php">
                    <span class="fa fa-paperclip text-dark"></span>
                    Annonces
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="liste_utilisateur.php">
                    <span class="fa fa-user text-dark"></span>
                    Utilisateurs
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link  position-relative text-dark" href="message.php">
                    <span class="fa fa-envelope text-dark"></span>
                    Messages
                    
                    </span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                    <span class="fa fa-sign-out-alt text-dark"></span>
                    Se déconnecter
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Déconnexion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Souhaitez-vous vraiment vous déconnecter ?
      </div>
      <div class="modal-footer">
      <a href="" class="btn btn-danger" data-bs-dismiss="modal">Non</a>
                <a href="../models/logout.php" class="btn btn-dark" >Oui</a>
      </div>
    </div>
  </div>
</div>