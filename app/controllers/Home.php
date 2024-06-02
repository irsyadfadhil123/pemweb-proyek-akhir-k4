<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $list = $this->model('List_model')->findById();
        $tugas = $this->model('Tugas_model')->findById($list);
        $pengingat = $this->model('Tugas_model')->findByTime($tugas);
        $data['pengingat'] = $pengingat;
        $data['judul'] = "Home";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function logout() {
        $this->view('home/logout');
    }

    public function profil() {
        $data['profil'] = $this->model('User_model')->findById();
        $data['judul'] = "Profil";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('home/profil', $data);
        $this->view('templates/footer');
    }

    public function edit() {
        $data['profil'] = $this->model('User_model')->findById();
        $data['judul'] = "Profil";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('home/edit', $data);
        $this->view('templates/footer');
    }

    public function editProfil() {        
        if (password_verify($_POST['oldPassword'], $_POST['password'])) {
            $data = $_FILES['gambar'];
            $verifikasi = $this->verifikasiGambar($data);
            if ($verifikasi['valid']) {
                $user = $this->model('User_model')->findById();
                $verifikasi['kosong'] ? $_POST['gambar'] = $user['gambar'] : $_POST['gambar'] = $verifikasi['namaGambar'];
                if (!empty($_POST['newPassword'])) {
                    if ($_POST['newPassword'] === $_POST['confirmPasword']) {
                        $_POST['newPassword'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $this->model('User_model')->update($_POST);
                        header("Location: " . BASEURL . '/home/profil');
                        exit;
                    }
                    echo "<script>alert('Konfirmasi Password yang anda masukkan salah!'); window.history.go(-1);</script>";
                    exit;
                }
                $_POST['newPassword'] = $user['password'];
                $this->model('User_model')->update($_POST);
                header("Location: " . BASEURL . '/home/profil');
                exit;
            }
            echo "<script>alert('Format Gambar salah/ukuran terlalu besar!'); window.history.go(-1);</script>";
            exit;
        }
        echo "<script>alert('Password yang anda masukkan salah!'); window.history.go(-1);</script>";
    }

    public function verifikasiGambar($data) {
        $hasil['kosong'] = false;
        $hasil['valid'] = true;
        
        $namaFile = $data['name'];
        $ukuranFile = $data['size'];
        $error = $data['error'];
        $tmpName = $data['tmp_name'];

        if ($error === 4) {
            $hasil['kosong'] = true;
            return $hasil;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $hasil['valid'] = false;
            return $hasil;
        }

        if ($ukuranFile > 2000000) {
            $hasil['valid'] = false;
            return $hasil;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        $targetDir = realpath(__DIR__ . '/../../public/img/');
        $targetFile = $targetDir . '/' . $namaFileBaru;
        move_uploaded_file($tmpName, $targetFile);
        
        $hasil['namaGambar'] = $namaFileBaru;
        return $hasil;
    }
}