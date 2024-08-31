<?php
class Person {
    public $name = "Unknown", 
        $country = "Not Available", 
        $age = "Undefined";
    function __construct($name="Unknown", $country="Not Available", $age="Undefined")
    {
        $this->name = $name;
        $this->country = $country;
        $this->age = $age;
    }

    function show() {
        echo "Name of person: {$this->name}<br>";
        echo "Country of person: {$this->country}<br>";
        echo "Age of person: {$this->age}<br>";
    }
}

$obj1 = new Person(
    $name="Usman Shahid",
    $country="Pakistan",
    $age=90
);
$obj1->show();
echo "<hr>";
$obj2 = new Person(
    $name="Steve Johnson",
    $country="Canada",
    $age=40
);
$obj2->show();

$obj3 = new Person;
$obj3->show();

?>