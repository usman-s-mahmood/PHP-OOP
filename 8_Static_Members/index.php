<?php 
# static data members of a class can be used outside the class without creating the object of class. If a static member is to be used within the class then self::dataMember would be used. A class that has all data members (attributes and functions) static would be called static class. In case of inheriting a static data member, parent keyword would be used
class Personal {
    public static $name = "Person";

    public static function staticSetName($name) {
        self::$name = $name;
    }

    public static function display() {
        echo self::$name . "\n";
    }

}

class Derived extends Personal {
    public function setName($name) {
        parent::$name = $name;
    }
    public function show() {
        echo parent::$name . "\n";
    }
}

$obj = new Derived();
Personal::staticSetName("Name Changed");
echo Personal::$name . "\n";
Personal::display();
// $obj->name = "Object 1";
// echo "Displaying Name attr. by using object instance: {$obj->name}\n";
$obj->setName("New Name");
$obj->show();
$obj->display();
?>