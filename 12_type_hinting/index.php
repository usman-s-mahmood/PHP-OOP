<?php
// specifying the datatype of function arguments

function sum(int $value) {
    echo $value + 10 . "\n";
}

function fruits(array $names) {
    foreach ($names as $name ) 
        echo $name . "\n";
}

sum(3);
$fr = ["apple", "mango", "kiwi", "watermelon"];

fruits($fr);

class Base {
    public function greet() {
        echo "Hello! from Base::greet()\n";
    }

    public function printName(OtherBase $names) {
        foreach ($names->names() as $n)
            echo $n . "\n";
    }
}

class OtherBase {
    public function bye() {
        echo "Good Bye! from OtherBase::bye()\n";
    }

    public function names() {
        return ["Afridi", "Baber", "Rizwan"];
    }
}


function useObject(OtherBase $obj) {
    $obj->bye();
}

class ICC {
    
}

useObject(new OtherBase());

$obj = new OtherBase();

$useObj = new Base();
$cricket = new ICC();
$useObj->printName($obj);

?>