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
        if($this->model('User_model')->addUser($_POST)> 0) {
            Flasher::setFlash('Berhasil melakukan Register', 'Pemberitahuan', 'success');
            header("Location: " . BASEURL . '/login/index');
            exit;
        }
        Flasher::setFlash('Gagal melakukan Register', 'Pemberitahuan', 'danger');
        header("Location: " . BASEURL . "/register/index");
        exit;
    }
}