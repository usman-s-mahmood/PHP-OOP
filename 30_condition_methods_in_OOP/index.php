<?php

trait MyTrait {
    public function trt() {
        echo "Trait Method!\n";
    }
};

interface MyInterface {

}
class MyClass {
    private $ppt;
    public function __construct() {
        if (interface_exists('MyInterface'))
            echo "MyInterface exists!\n";
        else 
            echo "MyInterface not found!\n";
        if (trait_exists('MyTrait')) 
            echo "MyTrait Exists!\n";
    }

    public function method() {
        echo "This is a method!\n";
    }
}

class Derived extends MyClass {
    public function __construct() {
        echo "Derived class made from Base class!\n";
    }
}

function main() {
    if (class_exists('MyClass')) {
        echo "MyClass exists in this file!\n";
        $obj1 = new MyClass();
        if (method_exists(
            $obj1,
            'method'
        )) {
            echo "Method found!\n";
            $obj1->method();
            if (property_exists(
                'MyClass',
                'ppt'
            )) 
                echo "PPT. exists in MyClass!\n";
            else 
                echo "No property with name ppt. found!\n";
            if (is_a(
                $obj1,
                'MyClass'
            ))
                echo "obj1 belongs to MyClass!\n";
            else
                echo "MyClass has no object obj1!\n";
            $attempt = is_subclass_of(
                $object_or_class = new Derived(),
                'MyClass'
            );
            if ($attempt)
                echo "Subclass Object exists!\n";  
            else
                echo "Subclass Object does not exist!\n";  
        }
        else
            echo "Method not found!\n";
    }
    else
        echo "MyClass Not Found!\n";
}

main();


?>