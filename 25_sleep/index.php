<?php

class Base {
    public $name;
    private $salary;
    private $id_card;
    public function __construct($name, $salary, $id_card) {
        $this->name = $name;
        $this->salary = $salary;
        $this->id_card = $id_card;
    }

    public function __sleep() {
        return array(
            'salary',
            'id_card'
        );
    }

}


function main() {
    ; // when an object of a class is to be stored in the database, file or session then it is first serialized but in case of OOP the object would be serialized(converted to array) with all of it's properties. To avoid this behaviour, sleep method is used for serializing the necessary attributes of the class

    $obj = new Base(
        $name="Usman Shahid",
        $salary=70000,
        $id_card='1837419hpqufue'
    );

    $sl = serialize($obj);
    print($sl);
}

main();


?>