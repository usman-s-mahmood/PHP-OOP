<?php

// if any non existing or private property or method is accessed then default behaviour is fatal error. __get() helps to give a custom warning 
class Base {
    private $ppt1 = 0;
    private $ppt2 = 0.1;
    private $arr = ['c'=>"Dennis Ritchie", "python" => "Guido Van Rossum"];

    public function __get($property) {
        if (array_key_exists($property, $this->arr))
        {
            echo $this->arr[$property] . "\n";
            return $this->arr[$property];
        }
        else
        {
            echo "Key not found in the array!\n";
            return ;
        }
        echo "This is private, protected or non existing property: $property\n";
    }
}

$obj1 = new Base();
echo $obj1->c;
print_r($obj1->test); // used for printing array or associative array

$test_arr = [
    "name" => "Usman",
    "Age" => 21,
    "is human" => true
];
print_r($test_arr);
?>