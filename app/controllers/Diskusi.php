<?php

class Diskusi extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function user($id) {
        $data = $_POST;
        if (is_null($data['reff'])) {
            $data['tugas_id'] = $id;
            $return = $this->model('Diskusi_model')->add($data);
            if ($return > 0) {
                if ($data['type'] == "user") {
                    header("Location: " . BASEURL . '/tugas/upload/' . $id);
                    exit;    
                } else {
                    header("Location: " . BASEURL . '/tugas/lihat/' . $id);
                    exit;    
                }
            }
        } else {
            $data['tugas_id'] = $id;
            $return = $this->model('Diskusi_model')->addReff($data);
            if ($return > 0) {
                if ($data['type'] == "user") {
                    header("Location: " . BASEURL . '/tugas/upload/' . $id);
                    exit;    
                } else {
                    header("Location: " . BASEURL . '/tugas/lihat/' . $id);
                    exit;    
                }
            }
        }
        echo "<script>alert('Gagal menambahkan Diskusi')</script>";
    }
}