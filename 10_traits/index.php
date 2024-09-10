<?php

# trait contains functions and attributes that can be used in various classes. An object of trait can not be instantiated yet a the methods and attributes defined within the trait can be used in any class

trait Test {
    public $data = 1;
    public function greet() {
        echo "Hello!\n";
    }
}

class Base1 {
    use Test;
}

class Base2 {
    use Test;
}

$obj1 = new Base1();
$obj1->greet();

$obj2 = new Base2();
$obj2->greet();

echo $obj1->data . "\n";

?>