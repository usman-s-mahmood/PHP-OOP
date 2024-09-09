<?php
// interface is similar to abstract class, it does not contain class attributes. Methods are only declared in interfaces

interface Base1 {
    function test();
}

interface OtherBase2 {
    function test2();
}

interface AnotherBase3 {
    function test3();
}

class Derived implements Base1, OtherBase2, AnotherBase3 {

    public function __construct() {

    }
    public function test() {
        echo "Test1 from interface 1\n";
    }

    public function test2() {
        echo "Test1 from interface 2\n";
    }

    public function test3() {
        echo "Test1 from interface 3\n";
    }

}

$test = new Derived();
$test->test();
$test->test2();
$test->test3();

?>