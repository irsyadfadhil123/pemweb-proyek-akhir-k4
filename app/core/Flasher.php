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
            echo "<label class='text-danger mb-1 mt-1'>" . $_SESSION["flash"]["pesan"] . "</label>";
            // desain flash message
            unset($_SESSION['flash']);
        }
    }
}