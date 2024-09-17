<?php

class MyClass {
    public $v1 = 3, 
        $v2 = True, 
        $v3 = "Something!";
    private $v4 = null;

    public function __construct() {
        print_r(get_class_vars(__class__)); // returns all data members irrespective of access specifier
        print_r(get_object_vars($this)); // returns the all attrs. of an object

    }

    private function f1() {

    }

    protected function f2() {
        
    }

    function name() {
        echo "Class Name: " . get_class($this) . "\n";
    }

    static public function test() {
        echo "Static Function called!\n";
        var_dump(get_called_class());
    }
}

class Derived extends MyClass {

    function __construct() {
        print_r(get_class_methods($this)); // will return all methods irrespective of access specifier
    }
    private function nothing() {

    }
    function prt_class() {
        echo "Parent Class is: " . get_parent_class($this) . "\n";
    }
}

function main() {
    $obj1 = new MyClass();
    $obj1->name();

    echo "Class Name of Object 1 is: " . get_class($obj1) . "\n";
    $obj2 = new Derived();
    $obj2->prt_class();
    echo "Parent Class is: " . get_parent_class($obj2) . "\n";
    echo "Parent Class is: " . get_parent_class('Derived') . "\n";
    print_r(get_class_methods('MyClass')); // returns the array of all public methods if called in main workspace

    print_r(get_class_vars('MyClass')); // only returns public attrs.
    print_r(get_object_vars($obj1)); // returns the public attrs. of an object
    MyClass::test();
    Derived::test();

    print_r(get_declared_classes()); // returns all the classes including default php classes being used in a php file

    print_r(get_declared_interfaces()); // same as above just returns all the interfaces
    print_r(get_declared_traits()); // returns all the traits in the file

    class_alias('MyClass', 'MCS');
    $new_obj1 = new MCS();
    
}

main();

?>