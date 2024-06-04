<?php

class File_model {
    private $table = 'file';
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, nama_file) VALUES (?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($_COOKIE['id'], $data['tugas_id'], $data['nama']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function findByClassId($data) {
        $query = "SELECT * FROM {$this->table} WHERE tugas_id = ?";
        $this->db->query($query);
        $this->db->bind($data);
        $result = $this->db->multi();

        return $result;
    }

    public function findByClassIdWithLimit($data, $pagination) {
        $query = "SELECT f.*, u.user_id, u.username, u.nama, u.gambar
        FROM file f
        INNER JOIN user u ON f.user_id = u.user_id
        WHERE f.tugas_id = ?
        LIMIT ?, ?";
        $this->db->query($query);
        $this->db->bind($data, $pagination['awalFile'], $pagination['jumlahDataPerHalaman']);
        $result = $this->db->multi();

        return $result;

    }
}