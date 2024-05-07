<?php

class User_model {
    private $table = 'user';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function addUser($data) {
        $query = "INSERT INTO {$this->table} (nama, username, password) VALUES (?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($data['nama'], $data['username'], $data['password']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}