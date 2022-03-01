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

    public function insertStudent($data){
        $query = "INSERT INTO {$this->table} VALUES ('', :name, :isn, :email, :department)";

        $this->db->query($query);
        $this->db->bind("name", $data["name"]);
        $this->db->bind("isn", $data["isn"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("department", $data["department"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteStudent($id){
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}