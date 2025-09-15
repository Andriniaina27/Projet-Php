<?php
require 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4 ">
            <div class="container-fluid p-top">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="">Liste des Utilisateurs</h4>
                    </div>
                    <div class="card-body" style="max-height: 75vh; overflow : scroll;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Nom</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Date d'inscription</th>
                                </thead>
                                <tbody>
                                <?php require '../models/liste_user.php'?>
                                <?php foreach ($row_user as $r):?>
                                    <tr>
                                        <td><?= $r['nom']?></td>
                                        <td><?= $r['email']?></td>
                                        <td><?= $r['role']?></td>
                                        <td><?= $r['date_inscription']?></td>
                                        
                                    </tr>
                                <?php endforeach;?>
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