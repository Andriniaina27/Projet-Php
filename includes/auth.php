<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../publics/login.php");
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

function isClient() {
    return isLoggedIn() && $_SESSION['role'] === 'client';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: ../public/login.php");
        exit;
    }
}