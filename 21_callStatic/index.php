<?php


class Base {
    private static function greet() {
        echo "Hello World!\n";
    }
    public static function __callStatic($method, $args) {
        if (method_exists(__class__, $method)) {
            call_user_func_array(
                [__class__, $method],
                $args
            );
            return ;
        }
        echo "This is a private level method with static attribution!\n";
    }
}


function main() {
    Base::greet();
}

main();

?>