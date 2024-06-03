<?php

class Kehadiran extends Controller {

    public function listKehadiran($tugas_id) {
        $result = $this->model('Tugas_model')->singleFindById($tugas_id);
        if ($result['admin'] == $_COOKIE['id']) {
            $list = $this->model('Kehadiran_model')->list($tugas_id);
            $userList = $this->model('User_model')->multiFindById($list);
            $data['judul'] = "List Kehadiran";
            $data['user'] = $userList;
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view('tugas/listKehadiran', $data);
            $this->view('templates/footer');
            exit;
        }
        Flasher::setFlash('Anda tidak memiliki akses ke List Kehadiran ini!', 'Pemberitahuan', 'warning');
        echo "<script>window.history.go(-1);</script>";
    }
    public function kehadiran($data) {
        if($this->model('Kehadiran_model')->verify($data)) {
            if($this->model('Kehadiran_model')->add($data) > 0) {
                Flasher::setFlash('Catatan Kehadiran berhasil diperbarui!', 'Pemberitahuan', 'success');
                echo "<script>window.history.go(-1);</script>";
                exit;
            }
            Flasher::setFlash('Catatan Kehadiran gagal diperbarui!', 'Pemberitahuan', 'danger');
            echo "<script> window.history.go(-1);</script>";
            exit;
        }
        Flasher::setFlash('Catatan Kehadiran sudah ada!', 'Pemberitahuan', 'info');
        echo "<script>window.history.go(-1);</script>";
        exit;
    }

}