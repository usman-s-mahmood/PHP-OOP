<?php


class Database {
    private $host = "localhost",
        $port = 3306,
        $user = "root",
        $database = "php_db",
        $password = "",
        $conn = false,
        $mysqli = null,
        $result = array();
    public function __construct() {
        // checking if connection exists or not
        if (!$this->conn) {
            $this->mysqli = new mysqli(
                $host = $this->host,
                $user = $this->user,
                $password = $this->password,
                $database = $this->database,
                $port = $this->port
            );

            if ($this->mysqli->connect_error) {
                array_push(
                    $this->result,
                    $this->mysqli->connect_error
                );
                return false;
            }
            else
                return true;
        }

    }

    public function insert() {

    }

    public function update() {

    }

    public function delete() {

    }

    public function select() {

    }

    public function __destruct() {
        if ($this->conn)
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        else
            return false;
    }
}



?>