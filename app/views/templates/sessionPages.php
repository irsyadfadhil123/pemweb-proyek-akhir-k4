<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/login/index");
    exit;
}
?>