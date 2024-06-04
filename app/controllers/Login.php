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
            Flasher::setFlash('Login Success!', 'Pemberitahuan', 'success');
            header("Location:" . BASEURL . "/home");
            exit;
        } else {
            Flasher::setFlash('Wrong Username/Password', 'Pemberitahuan', 'danger');
            header("Location:" . BASEURL . "/login");
        }
    }
}