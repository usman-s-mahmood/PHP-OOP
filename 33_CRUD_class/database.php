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

    public function update($table, $params=array(), $where=null) {
        if ($this->tableExists($table)) {
            // print_r($params);
            $args = array();
            foreach ($params as $key => $value)
                $args[] = "$key = '$value'";
            // echo "Updated Array is: \n";
            // print_r($args);
            $sql = "UPDATE $table SET " . implode(', ', $args);
            if ($where != null)
                $sql .= " WHERE $where;";
            // echo $sql . "\n";
            if ($this->mysqli->query($sql)) {
                array_push(
                    $this->result, 
                    $this->mysqli->affected_rows
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

    public function delete($table, $where=null) {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where != null)
                $sql .= " WHERE $where;";
            echo $sql . "\n";
            if ($this->mysqli->query($sql)) {
                array_push(
                    $this->result,
                    $this->mysqli->affected_rows
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

    public function select($table, $columns="*", $join=null, $where=null, $order=null, $limit=null) {
        if ($this->tableExists($table)) {
            $sql = "SELECT $columns FROM $table ";
            if ($join != null)
                $sql .= " JOIN $join ";
            if ($where != null)
                $sql .= " WHERE $where ";
            if ($order != null)
                $sql .= " ORDER BY $order ";
            if ($limit != null) {
                // $page = null;
                if (isset($_GET["page"]))
                    $page = $_GET['page'];
                else
                    $page = 1;
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit ";
            }
            $sql .= ";";
            
            // echo $sql . "\n";
            $this->sql($sql);
        }
        else
            return false;
    }


    public function pagination($table, $join=null, $where=null, $order=null, $limit=null) {
        if ($this->tableExists($table)) {
            if ($limit != null) {
                $sql = "SELECT COUNT(*) FROM $table ";
                if ($where != null)
                    $sql .= " WHERE $where";
                // if ($join =! null)
                //     $sql .= " JOIN $join";
                if ($order != null)
                    $sql .= " ORDER BY $order";
                echo $sql;
                echo "<br>$table, $join, $where, $order, $limit<br>";
                $query = $this->mysqli->query($sql);
                $total_records = $query->fetch_array();
                // print_r($total_records);
                $total_records = $total_records[0];
                // echo $total_records;
                $total_pages = ceil($total_records / $limit);
                $url = basename($_SERVER['PHP_SELF']);
                // $page = null;
                if (isset($_GET["page"]))
                    $page = $_GET['page'];
                else
                    $page = 1;
                $start = ($page - 1) * $limit;
                $output = "<ul class=\"pagination\">";
                if ($page > 1) {
                    $setPage = $page - 1;
                    $output .= "<li><a href=\"$url?page=$setPage\">Previous</a></li>";
                }
                if ($total_records > $limit)
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page)
                            $cls = "class=\"active\"";
                        else
                            $cls = "";
                        $output .= "<li><a $cls href=\"$url?page=$i\">$i</a></li>";
                    }
                if ($total_pages > $page) {
                    $setPage = $page + 1;
                    $output .= "<li><a href=\"$url?page=$setPage\">Next</a></li>";        
                }
                $output .= "</ul>";
                
                return $output . "<br>";
            }
            else
                echo "First False<br>";
                // return false;
        }
        else
            echo "second False<br>";
            // return false;
    }

    private function sql($sql) {
        $query = $this->mysqli->query($sql);
        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
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