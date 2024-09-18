<?php

require 'database.php';

function main() {
    $obj = new Database();

    if ($obj)
        echo "Connection Made!\n";
    else 
        echo "Failed Connection!\n";

    $passwd_hash = password_hash(
        'MyPassword10840528',
        PASSWORD_DEFAULT
    );
    // echo $passwd_hash . "\n";
    // echo "Current Date time: " . implode(', ', getdate()) . "\n";
    // $date = getdate();
    // echo getdate()["mday"] . "-" . $date["mon"] . "-" . $date["year"] . "\n";
    $date = getdate()["year"] . "-" . getdate()["mon"] . "-" . getdate()["mday"];
    $obj->insert(
        'users',
        [
            'username' => 'anotherone_php_user',
            'email' => 'test3@mail.com',
            'password' => password_hash(
                $password='somepassword123',
                $algo=PASSWORD_DEFAULT
            ),
            'created_at' => $date
        ]
    );
    print_r($obj->getResult());
}

main();


?>