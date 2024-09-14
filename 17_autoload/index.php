<?php


// require "first.php";
// require "second.php";

function __autoload($class) {
    require "./17_autoload/" . $class . ".php";
}

function main() {
    $obj1 = new first();
    $obj2 = new second();
}

main()
?>