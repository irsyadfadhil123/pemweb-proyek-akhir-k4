<?php
class Login extends Controller{

    public function index() {
        $data['judul'] = "Login Page";
        $this->view('templates/sessionLogin');
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function verifikasi() {
        $result = $this->model('User_model')->verify($_POST);

        if ($result) {
            $_SESSION["login"] = true;
            Flasher::setFlash('Login Berhasil!', 'Pemberitahuan', 'success');
            header("Location:" . BASEURL . "/home");
            exit;
        } else {
            Flasher::setFlash('Username/Password Salah', 'Pemberitahuan', 'danger');
            header("Location:" . BASEURL . "/login");
        }
    }
}