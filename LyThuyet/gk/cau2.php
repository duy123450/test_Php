<?php
function F2(&$a, $b = 6) {
    $a += 2;
    $b++;
    return $a + $b;
}
$n = 6;
$m = array_sum([1, 0, 2]);
$s = F2($n);
echo "<br>2. n=$n, m=$m, s=$s";