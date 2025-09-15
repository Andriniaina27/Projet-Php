<?php
require 'connexion.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ");
    exit();
}

function getUser(){
    $stmt = $GLOBALS['db']->prepare("SELECT nom AS user FROM utilisateurs WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}