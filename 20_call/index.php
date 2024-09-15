<?php


class Base {
    private $first_name;
    private $last_name;

    private function setName($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    function __call($method, $args) {
        if (method_exists($this, $method)) {
            echo "Attributes set!\n";
            call_user_func_array(
                [$this, $method],
                $args
            );
            return ;
        }
        echo "Invalid Operation! Call to a private or non existing function!\n";
    }
    public function show() {
        echo "$this->first_name $this->last_name\n";
    }
}


// used to give a custom warning if a private method is called

function main() {
    $obj1 = new Base();
    $obj1->setName(
        "Usman",
        "Shahid"
    );
    $obj1->show();
    print_r($obj1); // can be used for objects of classes
}

main();

?>