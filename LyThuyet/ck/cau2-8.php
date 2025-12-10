<?php
require_once 'classA.php';
$x = new A(2, 5);
// dung
echo A::$N;
// sai: echo $x->$N;