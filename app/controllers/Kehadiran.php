<?php

class Kehadiran extends Controller {
    public function __construct() {
        parent::__construct();
    }

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
        echo "<script>alert('Anda tidak memiliki akses ke List Kehadiran ini!'); window.history.go(-1);</script>";
    }
    public function kehadiran($data) {
        if($this->model('Kehadiran_model')->verify($data)) {
            if($this->model('Kehadiran_model')->add($data) > 0) {
                echo "<script>alert('Catatan Kehadiran berhasil diperbarui'); window.history.go(-1);</script>";
                exit;
            }
            echo "<script>alert('Catatan Kehadiran gagal diperbarui'); window.history.go(-1);</script>";
            exit;
        }
        echo "<script>alert('Catatan Kehadiran sudah ada'); window.history.go(-1);</script>";
        exit;
    }

}