<?php
function F1(&$a, &$b, $c = 2) {
    $a *= 4;
    $b -= 3;
    $c--;
    return $a + $b + $c;
}

$n = 2;
$m = "4" + "2";
$s = F1($n, $m);
echo "1.n = $n, m = $m, s = $s";