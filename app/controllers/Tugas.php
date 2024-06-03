<?php
class Tugas extends Controller {

    public function index() {
        
        $daftar = $this->model('List_model')->findById();
        $tugasnonAdmin = $this->model('Tugas_model')->findByIdNonAdmin($daftar);
        $tugasAdmin = $this->model('Tugas_model')->findByIdAdmin($daftar);
        $data['jumlahNonAdmin'] = count($tugasnonAdmin);
        $data['jumlahAdmin'] = count($tugasAdmin);
        $pagination = $this->pagination($data);
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

    public function pagination($data) {
        $jumlahDataPerHalaman = 3;

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

}