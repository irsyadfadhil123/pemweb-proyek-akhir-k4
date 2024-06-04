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
            Flasher::setFlash('Register Success!', 'Pemberitahuan', 'success');
            header("Location: " . BASEURL . '/login/index');
            exit;
        } else if ($return == -1) {
            Flasher::setFlash('Username is Taken', 'Pemberitahuan', 'danger');
            header("Location: " . BASEURL . "/register/index");
            exit;
        }
        Flasher::setFlash('Register Failed', 'Pemberitahuan', 'danger');
        header("Location: " . BASEURL . "/register/index");
        exit;
    }
}