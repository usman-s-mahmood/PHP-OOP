<?php


class abc {
    public function first() {
        echo "This is first\n";
        return $this;
    }

    public function second() {
        echo "This is second\n";
        return $this;
    }

    public function third() {
        echo "This is third\n";
        return $this;
    }
}

$t = new abc();
$t->first();
$t->second();
$t->third();
$t->first()->second()->third();


?>