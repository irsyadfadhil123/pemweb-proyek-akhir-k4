<?php

class File_model {
    private $table = 'file';
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }

    

}