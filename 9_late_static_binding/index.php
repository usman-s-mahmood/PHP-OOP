<?php


class Person {
    protected static $name = "John Doe";

    public function show() {
        echo self::$name . "\n";
        echo static::$name . "\n";
    }
}

class Employee extends Person {
    protected static $name = "James Alderson";

}

$test = new Employee;
$test->show();


?>