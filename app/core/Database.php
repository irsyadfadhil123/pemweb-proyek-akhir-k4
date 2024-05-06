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

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = 'i';
                    break;
                case is_double($value):
                    $type = 'd';
                    break;
                case is_string($value):
                    $type = 's';
                    break;
                case is_bool($value):
                    $type = 'i';
                    $value = $value ? 1:0;
                    break;
                case is_null($value):
                    $type = 's';
                    break;
                default:
                    $type = 's';
            }
        }
        $this->stmt->bind_param($type, $value);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function resultSet() {
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
}