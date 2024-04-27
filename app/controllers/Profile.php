<?php
class Profile extends Controller{
    public function index() {
        $data['judul'] = "Profil";

        $this->view('templatess/header', $data);
        $this->view('profile/index');
        $this->view('templatess/footer');
    }
}