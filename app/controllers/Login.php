<?php
class Login extends Controller{
    public function index() {
        $data['judul'] = "Login Page";
        $this->view('templatess/header', $data);
        $this->view('login/index');
        $this->view('templatess/footer');
    }
}