<?php

class Base {
    private $name;

    function __construct($n) {
        $this->name = $n;
    }

    protected function show() {
        echo "Name is: {$this->name} <br>";
    }
}

class Derived extends Base {
    public function get() {
        $this->show();
    }
}

$obj1 = new Derived("New User");
echo "Before changing class attr." . "<br>";
$obj1->get();
echo "After changing class attr." . "<br>";
// $obj1->name = "Another User";
// $obj1->show();


?>