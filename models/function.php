<?php
require 'connexion.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../publics/login.php");
    exit();
}

function getAnnonce(){
    $sql = "SELECT COUNT(*) AS titre FROM annonces";
    $req_annonce = $GLOBALS['db']->prepare($sql);
    $req_annonce->execute();
    return $req_annonce->fetch();
}

function getDemande(){
    $sql = "SELECT COUNT(*) AS dmd FROM demandes WHERE statut = 'en attente'";
    $req_demande = $GLOBALS['db']->prepare($sql);
    $req_demande->execute();
    return $req_demande->fetch();
}
function getLocation(){
    $sql = "SELECT COUNT(*) AS loc FROM contrats_location";
    $req_location = $GLOBALS['db']->prepare($sql);
    $req_location->execute();
    return $req_location->fetch();
}
function getClient(){
    $sql = "SELECT COUNT(*) AS client FROM utilisateurs WHERE role = 'client'";
    $req_client = $GLOBALS['db']->prepare($sql);
    $req_client->execute();
    return $req_client->fetch();
}

function getUser(){
    $stmt = $GLOBALS['db']->prepare("SELECT nom AS user FROM utilisateurs WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

function getAllUser(){
    $sql = "SELECT COUNT(*) AS client FROM utilisateurs WHERE role = 'client'";
    $req_client = $GLOBALS['db']->prepare($sql);
    $req_client->execute();
    return $req_client->fetch();
}