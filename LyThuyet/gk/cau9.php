<?php
$a = [1, 1, 2, 3];
$b = [];
foreach ($a as $k => $v)
    $b[] = $k + $v;
$s = array_sum($b);
echo "<br>9. s = $s";