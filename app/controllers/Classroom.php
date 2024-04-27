<?php
class Classroom extends Controller{
    public function index() {
        $data['judul'] = "Kelas";
        $this->view('templates/header', $data);
        $this->view('classroom/index');
        $this->view('templates/footer');
    }
}