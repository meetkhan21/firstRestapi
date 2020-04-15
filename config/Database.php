<?php

class Database
{
    // Set the parameters to private
    private $host = "localhost";
    private $user = "root";
    private $pass = "Ilovepakistan2";
    private $db = "rest";
    private $conn;

    public function connection()
    {
        $this->conn = null;
        try {
            // Setup conn
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
        return $this->conn;
    }
}