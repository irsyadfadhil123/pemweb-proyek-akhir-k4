<?php

class Flasher {

    public static function setFlash($pesan, $status, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'status' => $status,
            'tipe' => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            // desain flash message
            echo $_SESSION["flash"]["pesan"];
            // desain flash message
            unset($_SESSION['flash']);
        }
    }
}