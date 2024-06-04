<?php

class Kehadiran extends Controller {

    public function listKehadiran($tugas_id) {
        $result = $this->model('Tugas_model')->singleFindById($tugas_id);
        if ($result['admin'] == $_COOKIE['id']) {
            $list = $this->model('Kehadiran_model')->list($tugas_id);
            $count = count($list);
            $pagination = $this->pagination($count);
            $kehadiran = $this->model('Kehadiran_model')->listWithLimit($tugas_id, $pagination);
            $userList = $this->model('User_model')->multiFindById($kehadiran);

            $data['tugas_id'] = $tugas_id;
            $data['pagination'] = $pagination;
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

    public function pagination($data) {
        $jumlahDataPerHalaman = 2;

        $jumlahListKehadiran = $data;
        $jumlahHalamanListKehadiran = ceil($jumlahListKehadiran / $jumlahDataPerHalaman);
        $paramListKehadiran = explode('/', $_GET['url']);
        $halamanAktifListKehadiran = empty($paramListKehadiran[3]) ? 1 : (int)$paramListKehadiran[3];
        $awalListKehadiran = ($jumlahDataPerHalaman * $halamanAktifListKehadiran) - $jumlahDataPerHalaman;

        $pagination = [
            'jumlahDataPerHalaman' => $jumlahDataPerHalaman,
            'jumlahHalamanListKehadiran' => $jumlahHalamanListKehadiran,
            'halamanAktifListKehadiran' => $halamanAktifListKehadiran,
            'awalListKehadiran' => $awalListKehadiran,
        ];

        return $pagination;
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