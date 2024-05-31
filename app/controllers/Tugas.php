<?php
class Tugas extends Controller {

    public function __construct() {
        parent::__construct();
    }
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
        echo "<script>alert('Anda tidak memiliki akses ke tugas ini!'); window.history.go(-1);</script>";
    }

    public function lihat($id) {
        $result = $this->model('Tugas_model')->singleFindById($id);
        if ($result['admin'] == $_COOKIE['id']) {
            $data['tugas'] = $result;
            $data['judul'] = "Lihat Tugas";
            $this->view('templates/sessionPages');
            $this->view('templates/header', $data);
            $this->view("tugas/lihat", $data);
            $this->view('templates/footer');
            exit;
        }
        echo "<script>alert('Anda tidak memiliki akses ke tugas ini!'); window.history.go(-1);</script>";
    }

    public function buat() {
        $data = $this->model('Tugas_model')->add($_POST);
        if ($data) {
            $task = $this->model('Tugas_model')->findByKode($data);
            $this->model('List_model')->add($task);

            header("Location: " . BASEURL . '/tugas/index');
            exit;
        }
        echo "<script>alert('Gagal membuat Tugas')</script>";
    }

    public function tambah() {
        $data = $this->model('Tugas_model')->findByKode($_POST['kode_tugas']);
        if (!is_null($data)) {
            $check = $this->model('List_model')->check($data['tugas_id']);
            if (!($check > 0)) {
                $this->model('List_model')->add($data);
                header("Location: " . BASEURL . '/tugas/index');
                exit;
                }
            echo "<script>alert('Tugas sudah ditambahkan'); window.history.go(-1);</script>";
            exit;
        }
        echo "<script>alert('Tugas tidak ditemukan'); window.history.go(-1);</script>";
        exit;
    }

}