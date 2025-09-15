<?php
    require 'connexion.php';
    $req_user = "SELECT * FROM Utilisateurs WHERE role = 'client'";
    $row_user = $db->query($req_user)->fetchAll();