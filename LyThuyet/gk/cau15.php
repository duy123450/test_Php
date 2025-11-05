<?php
class A15{
    const a1 = 3;
    public $a1;
    function __construct($x){
        $this->a1 = $x;
    }
    function F1(){
        echo A15::a1 + $this->a1;
    }
}

class B15{
    public $b1;
    function __construct($x = 3){
        $this->b1 = $x;
    }
    function F2(){
        return new A15($this->b1 + 3);
    }
}

echo "<br>15:";
$mssv = "DH52201603";
$c = new B15(substr($mssv, -3) %2);
$c->F2()->F1();