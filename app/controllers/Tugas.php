<?php
class Tugas extends Controller{

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