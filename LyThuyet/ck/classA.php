<?php
class A {
    const SIZE = 10;
    public static $N = 1;
    public $a1 = 10;
    protected $a2 = 20;
    public function __construct($a1 = 1, $a2 = 2) {
        $this->a1 = $a1;
        $this->a2 = $a2;
    }
    function  F1() {
        echo $this->a1 . "-" . $this->a2;
    }
    protected function F2() {
        echo $this->a1 . "*" . $this->a2;
    }
}
class B {
    private $a1 = 1;
    protected $a2 = 2;
    public static $a3;
    public const a1 = 4;
    function __construct($a1 = 6, $a2 = 4) {
        $this->a1 = $a1;
        $this->a2 = $a2;
        B::$a3 = $a1 * $a2;
    }
    public function F1() {
        echo "<br>{$this->a1}-{$this->a2}-" . B::$a3 . "-" . B::a1;
    }
}
class C {
    function F2() {
        return new B(2);
    }
}
class D extends B {
    function F3() {
        echo $this->F1();
    }
}