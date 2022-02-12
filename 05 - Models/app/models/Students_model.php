<?php

class Students_model {
    // Data Base Handler
    private $dbh;
    // Statement
    private $stmt;

    public function __construct(){
        // Data Source Name
        $dsn = "mysql:host=localhost;dbname=phpmvc";

        try {
            $this->dbh = new PDO($dsn, "root", "");
        } catch(PDOException $error){
            die($error->getMessage());
        }
    }

    public function getAllStudents(){
        // Get Table
        $this->stmt = $this->dbh->prepare("SELECT * FROM students");
        $this->stmt->execute();
        // return in array assoc
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}