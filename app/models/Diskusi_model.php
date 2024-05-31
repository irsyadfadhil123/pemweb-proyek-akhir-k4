<?php

class Diskusi_model {
    private $table = 'diskusi';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $id = $_COOKIE['id'];
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, pesan, waktu) VALUES (?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($id, $data['tugas_id'], $data['pesan'], $date);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function findByTugasId($data) {
        $query = "SELECT d.*, u.username, u.nama, u.gambar
        FROM {$this->table} d
        INNER JOIN user u ON d.user_id = u.user_id
        WHERE d.tugas_id = ?;";
        
        $this->db->query($query);
        $this->db->bind($data);
        $diskusi = $this->db->multi();

        return $diskusi;
    }
}