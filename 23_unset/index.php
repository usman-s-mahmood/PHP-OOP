<?php


class Base {

    public $name = "Usman Shahid";
    private $salary = "100000";
    private $arr = [
        'key' => 'Value',
        'num' => 3
    ];

    public function __unset($property) {
        if (key_exists($property, $this->arr)) {
            echo "Unset!\n";
            unset($this->arr[$property]);
            return ;
        }
        else if (property_exists(__class__, $property)) {
            echo "$property unset!\n";
            unset($this->$property);
            return ;
        }
        echo "$property not found!\n";
    }
}

function main() { 
    $obj1 = new Base();
    print_r($obj1);
    unset($obj1->name);
    // unset($obj1->salary); // unset function is used to unset the value of a variable but it's problem in OOP is that it can't access private variables
    echo "After unsetting values!\n";
    unset($obj1->key);
    print_r($obj1);
}

main();


?>