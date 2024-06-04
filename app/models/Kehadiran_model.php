<?php

class Kehadiran_model {
    private $table = 'kehadiran';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $date = date("Y-m-d");
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, tanggal_kehadiran) VALUES (?,?,?)";
        $this->db->query($query);
        $this->db->bind($_COOKIE['id'], $data, $date);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function verify($data) {
        $query = "SELECT * FROM {$this->table} WHERE user_id = ? AND tugas_id = ?";
        $this->db->query($query);
        $this->db->bind($_COOKIE['id'], $data);
        $result = $this->db->single();

        if (empty($result)) {
            return true;
        }
        return false;
    }

    public function list($data) {
        $query = "SELECT * FROM {$this->table} WHERE tugas_id = ?";
        $this->db->query($query);
        $this->db->bind($data);
        $result = $this->db->multi();

        return $result;
    }

    public function listWithLimit($data, $pagination) {
        $query = "SELECT * FROM {$this->table} WHERE tugas_id = ? LIMIT ?, ?";
        $this->db->query($query);
        $this->db->bind($data, $pagination['awalListKehadiran'], $pagination['jumlahDataPerHalaman']);
        $result = $this->db->multi();

        return $result;

    }
}