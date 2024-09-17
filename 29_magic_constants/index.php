<?php

namespace std;

trait test {
    public function testFun() {
        echo __TRAIT__ . "\n";
    }
}

class Base {
    use test;

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function display() {
        echo "$this->name\n";
        echo __CLASS__ . "\t". __method__ . "\t" . __NAMESPACE__ . "\t". $this->testFun() ."\n";
    }
}

function main() {
    echo "Line Number: " . __LINE__ . "\n";
    echo "Directory: " . __DIR__ . "\n";
    echo "Absolute File Path: " . __FILE__ . "\n";
    echo "Function Name: " . __Function__ . "\n";
    $obj1 = new Base("Visual Studio Code");
    $obj1->display();
}

main();


?>