<?php
function F6($a) {
    foreach ($a as $k => $v) 
        $a[$k] += $v + $k;
    return implode('+', $a);
}
return "<br>6. " . F6([2, 1, 4, 1]);