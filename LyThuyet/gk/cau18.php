<?php
class E{
    const E1 = 0;
    public $e1 = '202040501';
    function F1(){
        $m = explode(E::E1, $this->e1);
        $t = 0;
        foreach($m as $k => $v)
            $t += $k + $v;
        return $t;
    }
}

echo "<br>18:";
$c5 = new E;
echo $c5->F1();