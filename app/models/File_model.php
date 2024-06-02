<?php

class File_model {
    private $table = 'file';
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, nama) VALUES (?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($_COOKIE['id'], $data['tugas_id'], $data['nama']);
        $this->db->execute();

        return $this->db->rowCount();
    }

}