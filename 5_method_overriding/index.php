<?php

use function PHPSTORM_META\override;

class Base {
    public $name;

    function __construct($name="None") {
        $this->name = $name;
    }

    function show() {
        echo "Name is: {$this->name}\n" ;
    }

    function calculate($a, $b) {
        return $a + $b;
    }
}

class Derived extends Base {
    function show() {
        echo "Derived Constructor\n{$this->name}\n";
    }

    function calculate($a, $b) {
        return $a * $b;
    }
}

$test = new Derived("Ahmad");

$test->show();

?>