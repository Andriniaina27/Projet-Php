<?php
session_start();
session_destroy();
header("Location: ../../publics/login.php");
exit;
// require ('')