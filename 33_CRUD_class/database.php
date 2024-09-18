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
            $this->conn = true;
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

    public function insert($table, $params=array()) {
        if ($this->tableExists($table)) {
            $table_columns = implode(
                ',', 
                array_keys($params)
            );
            $table_value = implode(
                "','", 
                $params
            );
            $sql = "INSERT INTO $table ($table_columns) values ('$table_value');";
            if ($this->mysqli->query($sql)) {
                array_push(
                    $this->result,
                    $this->mysqli->insert_id
                );
                return true;
            }
            else {
                array_push(
                    $this->result,
                    $this->mysqli->error
                );
                return false;
            }
        }
        else 
            return false;
    }

    public function update() {

    }

    public function delete() {

    }

    public function select() {

    }

    private function tableExists($table) {
        $sql = "SHOW TABLES FROM $this->database LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb)
        {
            if ($tableInDb->num_rows == 1)
                return true;
            else {
                array_push(
                    $this->result,
                    $table . " Does Not Exists!"
                );
                return false;
            }
        }

    }

    public function getResult() {
        $val = $this->result;
        $this->result = array();
        return $val;
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