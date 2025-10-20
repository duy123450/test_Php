<?php
function F4($s, &$arr) {
    // explode: split string into array by delimiter
    $arr = explode('+', $s);
}
$a = [1, 2];
F4('2+1+3', $a);
$s = 1;
foreach ($a as $v) 
    $s += $v;
echo "<br>4. s = $s";