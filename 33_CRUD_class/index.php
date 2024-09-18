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
    $date = getdate()["year"] . "-" . getdate()["mon"] . "-" . getdate()["mday"]; /*
    // The below code works fine
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
    print_r($obj->getResult()); */
    /*
    // This code is working as expected
    $obj->update(
        $table = 'users',
        $params = [
            'username' => 'another_user_edit',
            'email' => 'test3dit@mail.com'
        ],
        $where = "id=7"
    );
    print_r($obj->getResult()); */

    /* This method is working fine
    $obj->delete(
        $table = 'users',
        $where = "email='test3dit@mail.com'"
    );
    print_r($obj->getResult()); */

    // $obj->sql("select * from users where id=8;");
    // print_r($obj->getResult());

    $obj->select(
        $table="users",
        $row="username",
        $join="posts on users.id=posts.user_id",
        $where="users.id != 0",
        $order=" users.id desc",
        $limit=3
    );

    print_r($obj->getResult());

}

main();


?>