<?php
class Employee {
    public $name,
        $age,
        $salary;
    function __construct(
        $name="Unknown",
        $age="Undefined",
        $salary=0
    ) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    function show() {
        echo "Name is: {$this->name}" . "<br>";
        echo "Age is: {$this->age}" . "<br>";
        echo "Salary is: {$this->salary}" . "<br>";
    }
}

class Manager extends Employee {
    public $trv = 10000,
        $phoneCredit = 1000,
        $mgrSL;

    function show() {
        $this->salary = $this->trv + $this->phoneCredit;
        echo "Name is: {$this->name}" . "<br>";
        echo "Age is: {$this->age}" . "<br>";
        echo "Salary is: {$this->salary}" . "<br>";
    }
}

$e1 = new Manager("Ali", 30, 20000);
$e2 = new Employee("Asim", 22, 5000);
$e1->show();
$e2->show();

?>