<?php

// use function PHPSTORM_META\type;

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $conn;
    private $stmt;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function query($query){
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind(...$values) {
        $types = "";
        foreach ($values as $value) {
            if (is_int($value)) {
            $types .= 'i';
            } else if (is_double($value)) {
            $types .= 'd';
            } else if (is_string($value)) {
            $types .= 's';
            } else if (is_bool($value)) {
            $types .= 'i';
            $value = $value ? 1 : 0;
            } else {
            $types .= 's';
            }
        }
        $this->stmt->bind_param($types, ...$values);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function multi() {
        $this->execute();
        $result = $this->stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function single() {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_assoc();
    }

    public function rowCount() {
        return $this->stmt->affected_rows;
    }

    public function close() {
        $this->conn->close();
    }

    public function get() {
        return $this->stmt->get_result();
    }
}