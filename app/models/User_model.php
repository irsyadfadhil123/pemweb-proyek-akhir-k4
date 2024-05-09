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
                if (isset($data['remember'])) {
                    setcookie('id', $result['id'] , time() + 600, '/');
                    setcookie('username', $result['username'], time() + 600, '/');
                    setcookie('key', hash('sha256', $result['username']), time() + 600, '/');
                }
                return $result;
            }
        }
        return false;
    }

    public function cookieCheck($data) {
        $query = "SELECT username FROM {$this->table} WHERE id = ?";
        $this->db->query($query);
        $this->db->bind($_COOKIE['id']);
        $result = $this->db->single();

        if (!is_null($result)) {
            if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
                setcookie('username', $result['username'], time() + 600, '/');
            }
        }
        return $result;
    }
}