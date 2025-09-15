<?php
require 'header.php';
// require '../models/annonces.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4 ">
            <div class="container-fluid p-top">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Annonces</h4>
                    </div>
                    <div class="card-body">
                        <form action="../models/annonces.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Titre</label>
                                    <input type="text" name="titre" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="10" rows="3"></textarea>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Prix</label>
                                    <input type="number" name="prix" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Type</label>
                                    <select name="type" class="form-select" id="">
                                        <option value="vente">Vente</option>
                                        <option value="location">Location</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Insérer une image</label>
                                    <input type="file" name="images" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary text-bold" type="submit">Valider</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
require "footer.php";
?>