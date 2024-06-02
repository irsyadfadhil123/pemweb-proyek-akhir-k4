<?php

class User_model {
    private $table = 'user';
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }

    public function addUser($data) {
        $query = "INSERT INTO {$this->table} (nama, username, password, gambar) VALUES (?, ?, ?, ?)";
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->query($query);
        $this->db->bind($data['nama'], $data['username'], $data['password'], "nophoto");
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function update($data) {
        $query = "UPDATE {$this->table} SET username = ?, nama = ?, password = ?, gambar = ? WHERE user_id = ?";
        $this->db->query($query);
        $this->db->bind($data['username'], $data['nama'], $data['newPassword'], $data['gambar'], $_COOKIE['id']);
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

    public function multiFindById($data) {
        $all = [];
        foreach ($data as $list) {
            $query = "SELECT * FROM {$this->table} WHERE user_id = ?";
            $this->db->query($query);
            $this->db->bind($list['user_id']);
            $result = $this->db->single();
            $all[] = $result;
        }
        return $all;
    }

    public function verify($data) {
        $query = "SELECT * FROM {$this->table} WHERE username = ?";
        $this->db->query($query);
        $this->db->bind($data['username']);
        $result = $this->db->single();

        if (!is_null($result)) {
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

}