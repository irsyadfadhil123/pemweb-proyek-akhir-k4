<?php

class User_tugas_model {
    private $table = 'user_tugas';
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
}