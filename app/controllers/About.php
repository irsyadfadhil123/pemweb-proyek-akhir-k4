<?php

class About extends Controller{
    public function index($nama = 'Fadhil', $pekerjaan = 'Mahasiswa') {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = "About/Index";
        $this->view('templatess/header', $data);
        $this->view('about/index', $data);
        $this->view('templatess/footer');
    }

    public function page() {
        $data['judul'] = "Page";
        $this->view('templatess/header', $data);
        $this->view('about/page');
        $this->view('templatess/footer');
    }
}