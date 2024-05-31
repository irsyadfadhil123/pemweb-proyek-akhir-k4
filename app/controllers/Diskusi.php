<?php

class Diskusi extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function user($id) {
        $data = $_POST;
        $data['tugas_id'] = $id;
        $return = $this->model('Diskusi_model')->add($data);
        if ($return > 0) {
            header("Location: " . BASEURL . '/tugas/upload/' . $id);
            exit;
        }
        echo "<script>alert('Gagal menambahkan Diskusi')</script>";
    }
}