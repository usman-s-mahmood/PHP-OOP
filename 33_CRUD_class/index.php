<?php

require 'database.php';

function main() {
    $obj = new Database();

    if ($obj)
        echo "Connection Made!\n";
    else 
        echo "Failed Connection!\n";

}

main();


?>