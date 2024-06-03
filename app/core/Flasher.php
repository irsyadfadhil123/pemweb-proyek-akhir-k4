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
            echo '
            <div class="alert alert-' . $_SESSION['flash']['tipe'] . '" role="alert">
            ' . $_SESSION['flash']['status'] . ': ' . $_SESSION['flash']['pesan'] . '
            </div>
            ';
            // desain flash message
            unset($_SESSION['flash']);
        }
    }  
}