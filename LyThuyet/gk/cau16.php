<?php
class C{
    protected $c1, $c2, $c3;
    public static $c;
    function __construct($c1 = 1, $c2 = 2, $c3 = 3){
        $this->c1 = $c1;
        $this->c2 = $c2;
        $this->c3 = $c3;
        C::$c = $c1 + $c2 * $c3;
    }
    function F1(){
        return $this->c1 + $this->c2 + $this->c3 + C::$c;
    }
}

echo "<br>16:";
$o = new C(5);
$o2 = new C(7);
echo $o->F1() * C::$c;