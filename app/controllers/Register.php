<?php
class Register extends Controller{
    public function index() {
        $data['judul'] = "Register";
        $this->view('templatess/header', $data);
        $this->view('register/index');
        $this->view('templatess/footer');
    }
}