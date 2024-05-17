<?php

class List_model {
    private $table = 'list';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $id = $_COOKIE['id'];
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, admin) VALUES (?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($id, $data['tugas_id'], $data['admin']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function findById() {
        $id = $_COOKIE['id'];
        $query = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $this->db->query($query);
        $this->db->bind($id);
        $result = $this->db->multi();

        return $result;
    }

    public function check($data) {
        $id = $_COOKIE['id'];
        $query = "SELECT COUNT(*) as total FROM {$this->table} WHERE user_id = ? AND tugas_id = ?";
        $this->db->query($query);
        $this->db->bind($id, $data);
        $result = $this->db->single();

        return $result['total'];
    }
}