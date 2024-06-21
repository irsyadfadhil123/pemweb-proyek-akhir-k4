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
            <div class="alert alert-' . $_SESSION["flash"]["tipe"] . ' alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION["flash"]["status"] . '</strong> ' . $_SESSION["flash"]["pesan"] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            // desain flash message
            unset($_SESSION['flash']);
        }
    }
}