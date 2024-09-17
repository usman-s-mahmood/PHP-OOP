<?php

class Base {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function __invoke() {
        echo "This data member can't be called as a function!\n";
    }
}

function main() {
    $obj1 = new Base("Usman Shahid");
    $obj1->name();
}

main();



?>