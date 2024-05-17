<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('key', '', time() - 3600, '/');
    setcookie('username', '', time() - 3600, '/');

    header("Location: " . BASEURL . "/login");
    exit;
?>