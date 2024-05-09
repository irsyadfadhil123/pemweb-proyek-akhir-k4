<?php
class Login extends Controller{

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        // $data['type'] = "login";
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
            header("Location:" . BASEURL . "/home");
            exit;
        } else {
            header("Location:" . BASEURL . "/login");
        }
    }
}