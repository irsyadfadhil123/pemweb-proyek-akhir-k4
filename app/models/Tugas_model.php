<?php

class Tugas_model {
    private $table = 'tugas';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $id = $_SESSION['id'];
        $query = "INSERT INTO {$this->table} (admin, judul, deskripsi, deadline, kode_tugas) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($id, $data['judul'], $data['deskripsi'], $data['deadline'], $data['kode_tugas']);
        $this->db->execute();
        $result = $this->db->rowCount();
        
        if($result > 0) {
            return $data['kode_tugas'];
        }
        return false;
    }

    public function findByKode($data) {
        $query = "SELECT * FROM {$this->table} WHERE kode_tugas = ?";
        $this->db->query($query);
        $this->db->bind($data);
        $result = $this->db->single();

        return $result;
    }

    public function singleFindById($data) {
        $query = "SELECT * FROM {$this->table} WHERE tugas_id = ?";
        $this->db->query($query);
        $this->db->bind($data);
        $result = $this->db->single();

        return $result;
    }

    public function findById($data) {
        $all = [];
        foreach ($data as $daftar) {
            $query = "SELECT * FROM {$this->table} WHERE tugas_id = ?";
            $this->db->query($query);
            $this->db->bind($daftar['tugas_id']);
            $result = $this->db->single();

            $all[] = $result;
        }
        return $all;
    }
}