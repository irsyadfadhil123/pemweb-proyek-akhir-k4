<?php

class Tugas_model {
    private $table = 'tugas';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $id = $_COOKIE['id'];
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

    public function update($data) {
        $id = $_COOKIE['id'];
        $query = "UPDATE {$this->table} SET judul = ?, deskripsi = ?, deadline = ? WHERE kode_tugas = ?";
        $this->db->query($query);
        $this->db->bind($data['judul'], $data['deskripsi'], $data['deadline'], $data['kode_tugas']);
        $this->db->execute();
        $result = $this->db->rowCount();
        
        return $result;
    }

    public function findByKode($data) {
        $query = "SELECT * FROM {$this->table} WHERE kode_tugas = ?";
        $this->db->query($query);
        $this->db->bind($data);
        $result = $this->db->single();

        return $result;
    }

    public function singleFindById($data) {
        $query = "SELECT *,  
        TIMESTAMPDIFF(SECOND, NOW(), t.deadline) AS detik
        FROM {$this->table} t WHERE tugas_id = ?
        ";
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

    public function findByIdNonAdmin($data) {
        $all = [];
        foreach ($data as $daftar) {
            $query = "SELECT * FROM {$this->table} WHERE tugas_id = ? AND admin != ?";
            $this->db->query($query);
            $this->db->bind($daftar['tugas_id'], $_COOKIE['id']);
            $result = $this->db->single();

            if (!empty($result)) {
                $all[] = $result;
            }
        }
        return $all;
    }

    public function findByIdAdmin($data) {
        $all = [];
        foreach ($data as $daftar) {
            $query = "SELECT * FROM {$this->table} WHERE tugas_id = ? AND admin = ?";
            $this->db->query($query);
            $this->db->bind($daftar['tugas_id'], $_COOKIE['id']);
            $result = $this->db->single();

            if (!empty($result)) {
                $all[] = $result;
            }
        }
        return $all;
    }
    public function findByTime($awalTugas = 0, $jumlahDataPerHalaman = 100) {
        $id = $_COOKIE['id'];
        $query = "SELECT l.*, t.*, 
        TIMESTAMPDIFF(DAY, NOW(), t.deadline) AS hari, 
        TIMESTAMPDIFF(HOUR, NOW(), t.deadline) AS jam, 
        TIMESTAMPDIFF(MINUTE, NOW(), t.deadline) AS menit
        FROM list l
        INNER JOIN tugas t ON l.tugas_id = t.tugas_id
        WHERE l.user_id = ? 
        AND t.admin != ? 
        AND TIMESTAMPDIFF(MINUTE, NOW(), t.deadline) > 0 
        AND TIMESTAMPDIFF(DAY, NOW(), t.deadline) <= 7
        LIMIT ?, ?;
        ";
        $this->db->query($query);
        $this->db->bind($id, $id, $awalTugas, $jumlahDataPerHalaman);
        $result = $this->db->multi();

        return $result;
    }
}