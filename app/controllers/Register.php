<?php
class Register extends Controller{
    public function index() {
        $data['judul'] = "Register";
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }
}