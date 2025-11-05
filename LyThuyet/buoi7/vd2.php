<?php
// include_once 'class/A.php';
function myAutoLoad($className){
    include "class/$className.php";
}
spl_autoload_register('myAutoLoad');
$o2 = new A;
print_r($o2->F1());