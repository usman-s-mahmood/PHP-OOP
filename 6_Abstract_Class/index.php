<?php

abstract class Base {

    protected $name;
    
    protected function __construct($name) {
        $this->name = $name;
    }

    abstract protected function show();
}


class Derived extends Base {

    function __construct($name) {
        Base::__construct($name);
    }
    public function show() {
        echo "{$this->name}\n";
    }
}

$obj = new Derived('Usman');
$obj->show();

?>