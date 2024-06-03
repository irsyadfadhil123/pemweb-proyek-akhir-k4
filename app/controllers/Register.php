<?php
class Register extends Controller{
    public function index() {
        $data['judul'] = "Register";
        $this->view('templates/sessionLogin');
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function tambah(){
        $return = $this->model('User_model')->addUser($_POST);
        if($return> 0) {
            Flasher::setFlash('Berhasil melakukan Register', 'Pemberitahuan', 'success');
            header("Location: " . BASEURL . '/login/index');
            exit;
        } else if ($return == -1) {
            Flasher::setFlash('Username sudah ada!', 'Pemberitahuan', 'danger');
            header("Location: " . BASEURL . "/register/index");
            exit;
        }
        Flasher::setFlash('Gagal melakukan Register', 'Pemberitahuan', 'danger');
        header("Location: " . BASEURL . "/register/index");
        exit;
    }
}