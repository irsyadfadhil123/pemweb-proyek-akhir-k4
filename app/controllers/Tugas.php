<?php
class Tugas extends Controller {

    public function index() {
        $daftar = $this->model('List_model')->findById();
        $tugas = $this->model('Tugas_model')->findById($daftar);
        $data['tugas'] = $tugas;
        $data['judul'] = "Tugas";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('tugas/index', $data);
        $this->view('templates/footer');
    }

    public function buatTugas() {
        $data['judul'] = "Buat Tugas";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('tugas/buat');
        $this->view('templates/footer');
    }

    public function tambahTugas() {
        $data['judul'] = "Tambah Tugas";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('tugas/tambah');
        $this->view('templates/footer');
    }

    public function upload($id) {
        $result = $this->model('Tugas_model')->singleFindById($id);
        if ($result['admin'] !== $_COOKIE['id']) {
            $diskusi = $this->model('Diskusi_model')->findByTugasId($id);
            $data['diskusi'] = $diskusi;
            $data['tugas'] = $result;
            $data['judul'] = "Upload Tugas";
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view("tugas/upload", $data);
            $this->view('templates/footer');
            exit;
        }
        Flasher::setFlash('Anda tidak memiliki akses ke tugas ini!', 'Pemberitahuan', 'warning');
        echo "<script> window.history.go(-1);</script>";
    }

    public function lihat($id) {
        $result = $this->model('Tugas_model')->singleFindById($id);
        if ($result['admin'] == $_COOKIE['id']) {
            $diskusi = $this->model('Diskusi_model')->findByTugasId($id);
            $data['diskusi'] = $diskusi;
            $data['tugas'] = $result;
            $data['judul'] = "Lihat Tugas";
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view("tugas/lihat", $data);
            $this->view('templates/footer');
            exit;
        }
        Flasher::setFlash('Anda tidak memiliki akses ke tugas ini!', 'Pemberitahuan', 'warning');
        echo "<script> window.history.go(-1);</script>";
    }

    public function updateTugas($tugas_id) {
        $result = $this->model('Tugas_model')->singleFindById($tugas_id);
        if ($result['admin'] == $_COOKIE['id']) {
            $data['tugas'] = $result;
            $data['judul'] = "Update Tugas";
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view('tugas/updateTugas', $data);
            $this->view('templates/footer');
            exit;
        }
        echo "<script>alert('Anda tidak memiliki akses untuk memperbarui tugas ini!'); window.history.go(-1);</script>";
    }
    
    public function uploadFile($id) {
        $result = $this->model('Tugas_model')->singleFindById($id);
        if ($result['admin'] !== $_COOKIE['id']) {
            $data['tugas'] = $result;
            $data['judul'] = "Lihat Tugas";
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view("tugas/uploadFile", $data);
            $this->view('templates/footer');
            exit;
        }
        Flasher::setFlash('Anda tidak memiliki akses ke tugas ini!', 'Pemberitahuan', 'warning');
        echo "<script> window.history.go(-1);</script>";
    }

    public function buat() {
        $data = $this->model('Tugas_model')->add($_POST);
        if ($data) {
            $task = $this->model('Tugas_model')->findByKode($data);
            $this->model('List_model')->add($task);

            Flasher::setFlash('Berhasil membuat Tugas!', 'Pemberitahuan', 'success');
            header("Location: " . BASEURL . '/tugas/index');
            exit;
        }
        Flasher::setFlash('Gagal membuat Tugas!', 'Pemberitahuan', 'danger');
        echo "<script> window.history.go(-1);</script>";
    }

    public function tambah() {
        $data = $this->model('Tugas_model')->findByKode($_POST['kode_tugas']);
        if (!is_null($data)) {
            $check = $this->model('List_model')->check($data['tugas_id']);
            if (!($check > 0)) {
                $this->model('List_model')->add($data);
                Flasher::setFlash('Berhasil menambahkan Tugas!', 'Pemberitahuan', 'success');
                header("Location: " . BASEURL . '/tugas/index');
                exit;
                }
                Flasher::setFlash('Tugas sudah ditambahkan!', 'Pemberitahuan', 'info');
            echo "<script>window.history.go(-1);</script>";
            exit;
        }
        Flasher::setFlash('Tugas tidak ditemukan!', 'Pemberitahuan', 'danger');
        echo "<script> window.history.go(-1);</script>";
        exit;
    }

    public function update() {
        $data = $this->model('Tugas_model')->findByKode($_POST['kode_tugas']);
        if (!is_null($data)) {
            // Lakukan operasi update tugas
            $success = $this->model('Tugas_model')->update($_POST);
            if ($success) {
                header("Location: " . BASEURL . '/tugas/index');
                exit;
            } else {
                echo "<script>alert('Gagal mengupdate tugas'); window.history.go(-1);</script>";
                exit;
            }
        }
        echo "<script>alert('Tugas tidak ditemukan'); window.history.go(-1);</script>";
        exit;
    }
    
}