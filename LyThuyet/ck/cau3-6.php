<?php
function F6($a){
    $s = 0;
    foreach ($a as $i => $n)
        $s += $n + $i;
    return $s;
}
echo "<br>6. " . F6([2, 1, 0, 1]);
// 6. 10