<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['key'])) {
    if ($_COOKIE['key'] == hash('sha256', $data['profil']['username'])) {
        $_SESSION["login"] = true;
        $_SESSION['id'] = $data['profil']['user_id'];
    }
}

if (isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/home/index");
    exit;
}
?>