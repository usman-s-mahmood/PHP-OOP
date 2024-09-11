<?php
// in PHP if two or more classes of same name are imported from different files then it will cause errors, to avoid such situations namespace is used

include "first.php";
include "second.php";

$t1 = new first\test();
$t2 = new second\test();

$t1->t();
$t2->t();



?>