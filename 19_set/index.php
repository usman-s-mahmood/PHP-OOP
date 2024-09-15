<?php


class Base {
    private $name;

    public function __set($property, $value) {
        if (property_exists($this, $property))  {
            $this->$property = $value;
            echo "$property set to $value\n";
            return ;
        }
        echo "This is a private or non existing property!\n";
    }

    public function display() {
        echo "{$this->name}\n";
    }
}

// similar to get but the point of it's usage is that it does not allow assignment of value to a private or non existing ppt.
function main() {
    $obj1 = new Base();
    $obj1->test = "This is set!";
    $obj1->name = "Usman Shahid";
    $obj1->display();
}

main();

?>