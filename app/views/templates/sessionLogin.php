<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['username'])) {
    if ($_COOKIE['key'] === hash('sha256', $_COOKIE['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/home/index");
    exit;
}
?>