<?php
$a = [2, 4, 3, 1];
rsort($a);
$s = 0;
foreach($a as $k => $v)
    $s += $k * $v;
echo "<br>20:" . "s= $s" . array_sum($a);