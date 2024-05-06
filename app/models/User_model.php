<?php

class User_model {
    private $table = 'user';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function addUser($data) {
        $query = "INSERT INTO {$this->table} (id, username, nama, password) VALUES ('', ?, ?, ?)";

        $this->db->query($query);
        $this->db->bind(1, $data['username']);
        $this->db->bind(2, $data['nama']);
        $this->db->bind(3, $data['password']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}