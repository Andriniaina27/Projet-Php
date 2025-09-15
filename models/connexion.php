<?php
    $server = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "ImmoAgency";
        try {
            $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pwd);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connexion échouée: " . $e->getMessage();
    }
?>