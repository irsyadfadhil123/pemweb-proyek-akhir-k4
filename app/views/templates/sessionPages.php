<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['key'])) {
    if ($_COOKIE['key'] == hash('sha256', $data['profil']['username'])) {
        $_SESSION["login"] = true;
        $_SESSION['id'] = $data['profil']['user_id'];
        var_dump(!isset($_SESSION["login"]));
    }
}

if (!isset($_SESSION["login"])) {
    echo "test";
    // header("Location: " . BASEURL . "/login/index");
    exit;
}
?>