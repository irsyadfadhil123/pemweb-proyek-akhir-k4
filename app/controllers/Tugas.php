<?php
class Tugas extends Controller{

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $daftar = $this->model('User_tugas_model')->findById();
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

    public function buat() {
        $data = $this->model('Tugas_model')->add($_POST);
        if ($data) {
            $task = $this->model('Tugas_model')->findByKode($data);
            $this->model('User_tugas_model')->add($task);

            header("Location: " . BASEURL . '/tugas/index');
            exit;
        }
        echo "<script>alert('Gagal membuat Tugas')</script>";
    }

    public function tambah() {
        $data = $this->model('Tugas_model')->findByKode($_POST['kode_tugas']);
        if (!($data['kode_tugas'] == $_POST['kode_tugas'])) {
            $this->model('User_tugas_model')->add($data);
            header("Location: " . BASEURL . '/tugas/index');
            exit;
        }
    }
}