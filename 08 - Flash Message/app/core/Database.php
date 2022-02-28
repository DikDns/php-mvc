<?php

class Database {
    // Database Info
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    // Database Handler
    private $dbh;
    // Statement
    private $stmt;

    public function __construct(){
        // Data Source Name
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        // Option
        $option = [
            // Koneksi Terjaga Terus
            PDO::ATTR_PERSISTENT => true,
            // Mode Error
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $error){
            die($error->getMessage());
        }
    }

    public function query ($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind ($param, $value, $type = null) {
        // Clear the string to prevent sql injection
        if ( is_null($type) ){
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        // Bind them
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        // Call rowCount PDO
        return $this->stmt->rowCount();
    }

}