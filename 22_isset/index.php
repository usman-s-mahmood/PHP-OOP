<?php


class Base {
    public $name;
    private $id_card;
    private $detail = [
        'name' => '$this->name',
        'id_card' => '$this->id_card'
    ];

    public function setVals($name, $id_card) {
        $this->name1 = $name;
        $this->id_card = $id_card;
    }

    public function __isset($property) {
        if (property_exists(__class__, $property)) {
            echo "Key in array is (1 for set, 0 for not set): ". isset($this->detail[$property]). "\n";
        }
        echo isset($this->$property) . "\n";
    }

}

function main() {
    $obj1 = new Base();
    $obj1->setVals(
        "Usman Shahid",
        "0149835184705"
    );
    echo isset($obj1->id_card); // problem with isset function is that it can't be used with a private data member
    echo isset($obj1->name1);
}

main();


?>