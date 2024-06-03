<?php

class File extends Controller {

    public function tambah($id) {
        $file = $_FILES['file'];
        $verifikasi = $this->verifikasiFile($file);
        if ($verifikasi['choose']) {
            if ($verifikasi['ekstensi']) {
                if ($verifikasi['ukuran']) {
                    $data['nama'] = $verifikasi['namaFile'];
                    $data['tugas_id'] = $id;
                    if ($this->model('File_model')->add($data) > 0) {
                        Flasher::setFlash('Berhasil Upload File', 'Pemberitahuan', 'success');
                        echo "<script>alert('Berhasil Upload File');window.history.go(-1);</script>";
                        exit;
                    } 
                    Flasher::setFlash('Gagal Upload File', 'Pemberitahuan', 'danger');
                    echo "<script>window.history.go(-1);</script>";    
                    exit;
                }
                Flasher::setFlash('Gagal Upload File, Ukuran File terlalu besar', 'Pemberitahuan', 'danger');
                echo "<script>window.history.go(-1);</script>";            
                exit;
            }
        Flasher::setFlash('Gagal Upload File, Ekstensi File salah', 'Pemberitahuan', 'danger');
        echo "<script>window.history.go(-1);</script>";
        exit;
        }
    Flasher::setFlash('Gagal Upload File, Tidak memilih File', 'Pemberitahuan', 'danger');
    echo "<script>window.history.go(-1);</script>";
    }

    public function verifikasiFile($data) {
        $hasil['choose'] = true;
        $hasil['ekstensi'] = true;
        $hasil['ukuran'] = true;
        
        $namaFile = $data['name'];
        $ukuranFile = $data['size'];
        $error = $data['error'];
        $tmpName = $data['tmp_name'];

        if ($error === 4) {
            $hasil['choose'] = false;
            return $hasil;
        }

        $ekstensiFileValid = ['pdf', 'doc', 'docx'];
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));
        if (!in_array($ekstensiFile, $ekstensiFileValid)) {
            $hasil['ekstensi'] = false;
            return $hasil;
        }

        if ($ukuranFile > 2000000) {
            $hasil['ukuran'] = false;
            return $hasil;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFile;

        $targetDir = realpath(__DIR__ . '/../../public/files/');
        $targetFile = $targetDir . '/' . $namaFileBaru;
        move_uploaded_file($tmpName, $targetFile);
        
        $hasil['namaFile'] = $namaFileBaru;
        return $hasil;
    }

}