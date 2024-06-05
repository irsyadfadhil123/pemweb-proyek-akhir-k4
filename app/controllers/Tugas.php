<?php

use function PHPSTORM_META\type;

class Tugas extends Controller {

    public function index() {
        
        $daftar = $this->model('List_model')->findById();
        $tugasnonAdmin = $this->model('Tugas_model')->findByIdNonAdmin($daftar);
        $tugasAdmin = $this->model('Tugas_model')->findByIdAdmin($daftar);
        $data['jumlahNonAdmin'] = count($tugasnonAdmin);
        $data['jumlahAdmin'] = count($tugasAdmin);
        $pagination = $this->paginationTugas($data);
        $data['pagination'] = $pagination;

        $listTugasNonAdmin = $this->model('List_model')->findWithLimitNonAdmin($pagination);
        $listTugasAdmin = $this->model('List_model')->findWithLimitAdmin($pagination);
        $hasilTugasNonAdmin = $this->model('Tugas_model')->findById($listTugasNonAdmin);
        $hasilTugasAdmin = $this->model('Tugas_model')->findById($listTugasAdmin);
        $data['hasilTugasNonAdmin'] = $hasilTugasNonAdmin;
        $data['hasilTugasAdmin'] = $hasilTugasAdmin;
        $data['judul'] = "Tugas";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view('tugas/index', $data);
        $this->view('templates/footer');
    }

    public function paginationTugas($data) {
        $jumlahDataPerHalaman = 2;

        $jumlahTugasNonAdmin = $data['jumlahNonAdmin'];
        $jumlahHalamanTugasNonAdmin = ceil($jumlahTugasNonAdmin / $jumlahDataPerHalaman);
        $paramTugasNonAdmin = explode('/', $_GET['url']);
        $halamanAktifTugasNonAdmin = empty($paramTugasNonAdmin[2]) ? 1 : (int)$paramTugasNonAdmin[2];
        $awalTugasNonAdmin = ($jumlahDataPerHalaman * $halamanAktifTugasNonAdmin) - $jumlahDataPerHalaman;

        $jumlahTugasAdmin = $data['jumlahAdmin'];
        $jumlahHalamanTugasAdmin = ceil($jumlahTugasAdmin / $jumlahDataPerHalaman);
        $paramTugasAdmin = explode('/', $_GET['url']);
        $halamanAktifTugasAdmin = empty($paramTugasAdmin[3]) ? 1 : (int)$paramTugasAdmin[3];
        $awalTugasAdmin = ($jumlahDataPerHalaman * $halamanAktifTugasAdmin) - $jumlahDataPerHalaman;

        $pagination['jumlahDataPerHalaman'] = $jumlahDataPerHalaman;
        $pagination['jumlahHalamanTugasNonAdmin'] = $jumlahHalamanTugasNonAdmin;
        $pagination['jumlahHalamanTugasAdmin'] = $jumlahHalamanTugasAdmin;
        $pagination['halamanAktifTugasNonAdmin'] = $halamanAktifTugasNonAdmin;
        $pagination['halamanAktifTugasAdmin'] = $halamanAktifTugasAdmin;
        $pagination['awalTugasNonAdmin'] = $awalTugasNonAdmin;
        $pagination['awalTugasAdmin'] = $awalTugasAdmin;

        return $pagination;
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
            $file = $this->model('File_model')->findByClassAndUserId($id);
            $diskusi = $this->model('Diskusi_model')->findByTugasId($id);
            is_null($file) ? $data['type'] = "Upload Tugas" : $data['type'] = "Edit Tugas";
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
        $type = $this->model('File_model')->findByClassAndUserId($id);
        if (empty($type)) {
            $result = $this->model('Tugas_model')->singleFindById($id);
            if ($result['admin'] !== $_COOKIE['id']) {
                if (!($result['detik'] <= 0)) {
                    $data['tugas'] = $result;
                    $data['judul'] = "Upload Tugas";
                    $this->view('templates/sessionPages');
                    $this->view('templates/header', $data);
                    $this->view("tugas/uploadFile", $data);
                    $this->view('templates/footer');
                    exit;    
                }
                Flasher::setFlash('Tugas sudah mencapai Deadline!', 'Pemberitahuan', 'warning');
                echo "<script> window.history.go(-1);</script>";
                exit;
            }
            Flasher::setFlash('Anda tidak memiliki akses ke tugas ini!', 'Pemberitahuan', 'warning');
            echo "<script> window.history.go(-1);</script>";
            exit;
        } else {
            $result = $this->model('Tugas_model')->singleFindById($id);
            if ($result['admin'] !== $_COOKIE['id']) {
                if (!($result['detik'] <= 0)) {
                    $data['type'] = $type;
                    $data['tugas'] = $result;
                    $data['judul'] = "Edit File Tugas";
                    $this->view('templates/sessionPages');
                    $this->view('templates/header', $data);
                    $this->view("tugas/editFile", $data);
                    $this->view('templates/footer');
                    exit;
                }
                Flasher::setFlash('Tugas sudah mencapai Deadline!', 'Pemberitahuan', 'warning');
                echo "<script> window.history.go(-1);</script>";
                exit;  
            }
            Flasher::setFlash('Anda tidak memiliki akses ke tugas ini!', 'Pemberitahuan', 'warning');
            echo "<script> window.history.go(-1);</script>";
            exit;
        }
    }

    public function lihatFile($tugas_id) {
        $semuaFile = $this->model('File_model')->findByClassId($tugas_id);
        $jumlahFile = count($semuaFile);
        $pagination = $this->pagination($jumlahFile);
        $semuaFile = $this->model('File_model')->findByClassIdWithLimit($tugas_id, $pagination);
        $data['tugas_id'] = $tugas_id;
        $data['pagination'] = $pagination;
        $data['files'] = $semuaFile;
        $data['judul'] = "Lihat File";
        $this->view('templates/sessionPages');
        $this->view('templates/header', $data);
        $this->view("tugas/lihatFile", $data);
        $this->view('templates/footer');

        exit;
    }

    public function pagination($data) {
        $jumlahDataPerHalaman = 2;

        $jumlahFile = $data;
        $jumlahHalamanFile = ceil($jumlahFile / $jumlahDataPerHalaman);
        $paramFile = explode('/', $_GET['url']);
        $halamanAktifFile = empty($paramFile[3]) ? 1 : (int)$paramFile[3];
        $awalFile = ($jumlahDataPerHalaman * $halamanAktifFile) - $jumlahDataPerHalaman;

        $pagination = [
            'jumlahDataPerHalaman' => $jumlahDataPerHalaman,
            'jumlahHalamanFile' => $jumlahHalamanFile,
            'halamanAktifFile' => $halamanAktifFile,
            'awalFile' => $awalFile,
        ];

        return $pagination;
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