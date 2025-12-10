<?php
$a = [
    [1, 2, 4],
    [2 => 1, 0 => 7, 1 => 1]
];
$s = 0;
unset($a[1][$a[0][1]]);
foreach ($a as $k => $v)
    foreach ($v as $k1 => $v1)
        $s += $v1;
echo "<br>10.$s"; // 10.15