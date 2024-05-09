<?php

class User_model {
    private $table = 'user';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function addUser($data) {
        $query = "INSERT INTO {$this->table} (nama, username, password) VALUES (?, ?, ?)";
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->query($query);
        $this->db->bind($data['nama'], $data['username'], $data['password']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function verify($data) {
        $query = "SELECT * FROM {$this->table} WHERE username = ?";
        $this->db->query($query);
        $this->db->bind($data['username']);
        $result = $this->db->single();
        //verify username
        if (!is_null($result)) {
            // verify password
            if (password_verify($data['password'], $result['password'])) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}