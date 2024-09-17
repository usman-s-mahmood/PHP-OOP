<?php


class Base {
    public $name;
    public $course;

    public function __construct ($name, Course $course) {
        $this->name = $name;
        $this->course = $course;
    }

    public function __clone() {
        $this->course = clone $this->course;
    }
    
}

class Course {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function __toString() {
        return ($this->name);
    }
}

function main() {
    // $a = 5;
    // $b = & $a;
    // $a = 2;
    // $b = 8;
    // echo "$a and $b\n";
    $obj1 = new Base(
        $name="Usman Shahid",
        $course=new Course("Python")
    );
    echo $obj1->name . "\n";
    $obj2 = clone $obj1;
    $obj2->name = "Another Name";
    echo "Name of object 1: " . $obj1->name . "\n";
    echo "Name of object 2: " . $obj2->name . "\n";
    $js = new Course("javascript");
    $obj2->course = $js;
    // $obj2->course->name = 'COBOL';
    print_r($obj1);
    print_r($obj2);
}

main();

?>