<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: view/dashboard.php");
    } else {
        header("Location: public/dashboard.php");
    }
} else {
    header("Location: publics/login.php");
}
exit;