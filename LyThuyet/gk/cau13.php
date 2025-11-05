<?php
class A{
    const a1 = 2;
    public static $a1 = 3;
    public $a2 = 4;
    protected $a3 = 5;
    public function __construct($a1 = 1, $a2 = 2){
        self::$a1 = $a1;
        $this->a2 = $a2;
    }
    function F1(){
        $this->F2();
    }
    protected function F2(){
        echo self::$a1 . "-" . self::a1 . "-" . $this->a2 . "-" . $this->a3;
    }
}

echo "<br>13:";
$x = new A(4);
$x->F1();