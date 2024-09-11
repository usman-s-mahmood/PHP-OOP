<?php

trait test {
    public function hello() {
        echo "Hello! this is test trait\n";
    }

    private function bye() {
        echo "Good Bye!\n";
    }
}

trait greet {
    public function hello() {
        echo "Greetings!\n";
    }
}

class A {
    public function hello() {
        echo "Hello from class A\n";
    }
}

class B extends A {
    use test;
    public function hello() {
        echo "Hello from class B\n";
    }
}

class C {
    use test {
        test::bye as public good_bye; # this will change the access specifier of a function within the trait block
    }
    use greet {
        test::hello insteadof greet;
        greet::hello as new_hello; # this will rename the hello of greet method which will allow both functions to run
    }
}

$obj = new B();
$obj->hello();

$test_obj = new C();

$test_obj->hello();
$test_obj->new_hello();
$test_obj->good_bye();

# first priority will be given within the class then it would be given to trait and then priority would be given to parent class

?>