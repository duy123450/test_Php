<?php
class A14{
    const a1 = 4;
    public $a1;
    function __construct($x){
        $this->a1 = $x;
    }
    function F1(){
        echo A14::a1 + $this->a1;
    }
}

class B14{
    public $b1;
    function __construct($x = 2){
        $this->b1 = $x;
    }
    function F2(){
        return new A14($this->b1 + 3);
    }
}

echo "<br>14:";
$b1 = new B14();
$a1 = $b1->F2();
$a1->F1();