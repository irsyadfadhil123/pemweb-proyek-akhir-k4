<?php

class Diskusi extends Controller {

    public function user($id) {
        $data = $_POST;
        if (is_null($data['reff'])) {
            $data['tugas_id'] = $id;
            $return = $this->model('Diskusi_model')->add($data);
            if ($return > 0) {
                if ($data['type'] == "user") {
                    Flasher::setFlash('Sukses menambahkan Diskusi', 'Pemberitahuan', 'success');
                    header("Location: " . BASEURL . '/tugas/upload/' . $id);
                    exit;    
                } else {
                    Flasher::setFlash('Sukses menambahkan Diskusi', 'Pemberitahuan', 'success');
                    header("Location: " . BASEURL . '/tugas/lihat/' . $id);
                    exit;    
                }
            }
        } else {
            $data['tugas_id'] = $id;
            $return = $this->model('Diskusi_model')->addReff($data);
            if ($return > 0) {
                if ($data['type'] == "user") {
                    Flasher::setFlash('Sukses menambahkan Balasan', 'Pemberitahuan', 'success');
                    header("Location: " . BASEURL . '/tugas/upload/' . $id);
                    exit;    
                } else {
                    Flasher::setFlash('Sukses menambahkan Balasan', 'Pemberitahuan', 'success');
                    header("Location: " . BASEURL . '/tugas/lihat/' . $id);
                    exit;    
                }
            }
        }
        if ($data['type'] == "user") {
            Flasher::setFlash('Gagal menambahkan Diskusi', 'Pemberitahuan', 'danger');
            header("Location: " . BASEURL . '/tugas/upload/' . $id);
            exit;    
        } else {
            Flasher::setFlash('Gagal menambahkan Diskusi', 'Pemberitahuan', 'danger');
            header("Location: " . BASEURL . '/tugas/lihat/' . $id);
            exit;    
        }
    }
}