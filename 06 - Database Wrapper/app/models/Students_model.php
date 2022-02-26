<?php

class Students_model {
    private $table = "students";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllStudents(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getStudentById($id){
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
}