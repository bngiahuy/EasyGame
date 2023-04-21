<?php
require("connection.php");
class Database
{
    private static $instance = null;
    private $conn;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        // Create connection
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }


    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if ($result === false) {
            die('Query failed: ' . $this->conn->error);
        }
        return $result;
    }


    public function __clone()
    {
        // Prevent cloning of singleton instance
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        // Prevent unserializing of singleton instance
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
}
