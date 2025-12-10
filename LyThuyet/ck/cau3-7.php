<?php
function F7(&$a, $b = 2) {
    array_push($a, $b);
}
$a = [1, 2, 4];
F7($a, 3);
echo "<br>7. ";
foreach ($a as $k => $v)
    echo "$k-$v";
// 7. 0-11-22-43-3