<?php
class A{
    public const PI = 3.14;
    public static $count = 0;
    public $r;
    public function __construct($bk){
        $this->r = $bk;
        A::$count++;
    }
    public function getArea(){
        return $this->r ** 2 * A::PI;
    }
}

$o1 = new A(2);
$o2 = new A(3);
echo $o1->getArea()."<br>";
echo "<br>So object duoc tao: " . A::$count . ", PI= " . A::PI;