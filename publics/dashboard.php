<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] === 'admin') {
    header("Location: ../view/dashboard.php");
} else {
    header("Location: ../view/client/index.php");
}
exit;
