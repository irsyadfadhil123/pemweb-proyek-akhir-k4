<?php
class Classroom extends Controller{
    public function index() {
        $data['judul'] = "Kelas";
        $this->view('templatess/header', $data);
        $this->view('classroom/index');
        $this->view('templatess/footer');
    }
}