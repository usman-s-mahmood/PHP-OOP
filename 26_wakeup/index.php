<?php

class Base {
    public $course="Python";
    private $first_name,
        $last_name,
        $conn;
    
    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->conn = mysqli_connect(
            $hostname="localhost",
            $user="root",
            $password="",
            $database="test",
            $port=3306
        );
    }

    public function __sleep() {
        return array(
            'first_name',
            'last_name'
        );
    }

    public function __wakeup() {
        mysqli_close($this->conn);
        echo "Wakeup function called!\n";
    }
}

function main() { // unserialize method is used to return an object on the basis of serialized data. For unserializing data in case of OOP, wakeup method is used. It is used rarely
    $obj1 = new Base(
        $first_name="Usman",
        $last_name="Shahid",
    );
    $sl = serialize($obj1);
    $us = unserialize($sl);

    echo "serialized: \n";
    print_r($sl);
    echo "unserialized: \n";
    print_r($us);
}

main();

?>