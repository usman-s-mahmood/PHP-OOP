<?php


class Base {
    private $conn;
    function __construct() {
        $this->conn = mysqli_connect(
            $hostname="localhost",
            $username="root",
            $password="",
            $database="test",
            $port=3306
        );
        echo "Base class Constructor called!\n";
    }

    function __destruct() {
        echo "Base class DESTRUCTOR called!\n";
        mysqli_close($this->conn);
    }
}


$obj = new Base();

?>