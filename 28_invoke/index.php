<?php

class Base {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function __invoke() {
        echo "Object of class " . __class__ . "\n";
        print_r($this);
    }
}

function main() { // invoke magic method is used to return an output if an object of that class is being called as a function
    $obj1 = new Base("Usman Shahid");
    $obj1();
}

main();



?>