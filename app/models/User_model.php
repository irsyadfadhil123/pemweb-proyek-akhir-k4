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

    public function update($data) {
        $query = "UPDATE {$this->table} SET username = ?, nama = ?, password = ? WHERE user_id = ?";
        $this->db->query($query);
        $this->db->bind($data['username'], $data['nama'], $data['newPassword'], $_COOKIE['id']);
        $this->db->execute();

    }

    public function findById() {
        $id = $_COOKIE['id'];
        $query = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $this->db->query($query);
        $this->db->bind($id);
        $result = $this->db->single();

        return $result;
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
                setcookie('id', $result['user_id'] , time() + 6000000, '/');
                if (isset($data['remember'])) {
                    setcookie('username', $result['username'], time() + 6000000, '/');
                    setcookie('key', hash('sha256', $result['username']), time() + 6000000, '/');
                }
                return $result;
            }
        }
        return false;
    }

    public function cookieCheck($data) {
        // $query = "SELECT username FROM {$this->table} WHERE id = ?";
        // $this->db->query($query);
        // $this->db->bind($_COOKIE['id']);
        // $result = $this->db->single();

        // if (!is_null($result)) {
        //     if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        //         setcookie('username', $result['username'], time() + 600, '/');
        //     }
        // }
        // return $result;
    }
}