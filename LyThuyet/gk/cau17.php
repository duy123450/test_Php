<?php
class D{
    function __construct(){
        echo 10;
    }
    function __destruct(){
        echo 2;
    }
}

echo "<br>17:";
$d1 = new D;
$d2 = new D();
$d1 = null;
$d1 = new D;