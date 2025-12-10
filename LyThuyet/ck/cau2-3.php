<?php
$a = array(1, 2, 3, 4, 5);
$t = 0;
foreach ($a as $k => $v)
    if($k % 2)
        $t += $v;
echo $t; // 6