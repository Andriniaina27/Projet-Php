<?php
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $requete = $db->prepare("SELECT * FROM annonces WHERE id = ?");
        $requete->execute([$id]);
        $row = $requete->fetch();
    }