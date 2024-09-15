<?php

class Base {
    public $name;

    public function __toString() {
        return "Object of class: " . get_class($this) . "\n";
    }
    
}

function main() {
    $obj1 = new Base();
    echo $obj1 . "\n";
}

main();

?>