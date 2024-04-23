<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = "Home";
        $this->view('templatess/header', $data);
        $this->view('home/index');
        $this->view('templatess/footer');
    }
}