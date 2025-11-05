<?php
class F{
    public $e1 = '1-2-3-0';
    protected $e2 = [1, 0, 3];
    function F1(){
        $m = explode('-', $this->e1);
        $t = 0;
        foreach($m as $k => $v)
            if(in_array($this->e2[1], $m))
                unset($m[$k]);
        return array_sum($m);
    }
}

echo "<br>19:";
$c6 = new F;
echo $c6->F1();