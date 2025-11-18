<?php
class A
{
    public $a1;
    protected $a2;
    private $a3;
    public static $a4 = 0;
    public const a1 = 2;
    public function __construct($a1, $a2, $a3 = 3)
    {
        $this->a1 = $a1;
        $this->a2 = $a2;
        $this->a3 = $a3;
        A::$a4 += A::a1;
    }
    public function __destruct()
    {
        echo 1;
    }
    public function __toString()
    {
        return $this->a1*2;
    }
    protected function F1()
    {
        echo $this->a1 + $this->a2 + $this->a3 + A::$a4;
    }
    public function F2()
    {
        $this->F1();
    }
}

$o1 = new A(1, 2);
$o1->F2();
$o1 = null;
$o1 = new A(2, 1, 2);
$o2 = new A(1, 1);
echo A::a1;
$o2->F2();
$o1->F2();
echo $o1;