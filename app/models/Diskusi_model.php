<?php

class Diskusi_model {
    private $table = 'diskusi';
    private $db;
    private $i = 0;

    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $id = $_COOKIE['id'];
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, pesan, waktu) VALUES (?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($id, $data['tugas_id'], $data['pesan'], $date);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addReff($data) {
        $id = $_COOKIE['id'];
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO {$this->table} (user_id, tugas_id, pesan, waktu, reff) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind($id, $data['tugas_id'], $data['pesan'], $date, $data['reff']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function findByTugasId($data) {
        $query = "SELECT d.*, u.user_id, u.username, u.nama, u.gambar
        FROM {$this->table} d
        INNER JOIN user u ON d.user_id = u.user_id
        WHERE d.tugas_id = ? AND reff IS NULL;";
        $this->db->query($query);
        $this->db->bind($data);
        $diskusi = $this->db->multi();

        foreach ($diskusi as  $reff) {
            $result = $this->findByReff($reff);
            if (!empty($result)) {
                $diskusi[$this->i]['balasan'] = $result;
                array_push($diskusi[$this->i], $diskusi[$this->i]['balasan']);
            }
            $this->i++;
        }
        return $diskusi;
    }

    public function findByReff($data) {
        $query = "SELECT d.*, u.user_id, u.username, u.nama, u.gambar
        FROM {$this->table} d
        INNER JOIN user u ON d.user_id = u.user_id
        WHERE d.tugas_id = ? AND d.reff = ?;";
        $this->db->query($query);
        $this->db->bind($data['tugas_id'], $data['diskusi_id']);
        $diskusi = $this->db->multi();

        return $diskusi;
    }
}