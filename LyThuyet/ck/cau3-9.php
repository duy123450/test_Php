<?php
$a = [1, 3, 2];
$b = [];
foreach ($a as $k => $v)
    $b[] = $k + $v;
$s = array_sum($b);
echo "<br>9. " . $s; // 9. 9