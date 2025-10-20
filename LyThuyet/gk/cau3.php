<?php
// $v % 2 means $v is odd
function F3($arr, $n = 3) {
    $s = 2;
    foreach ($arr as $k => $v)
        if ($v % 2 && $k < $n)
            $s += $arr[$k];
    return $s;
}
echo "<br>3. " . F3([4, 2, 5, 9, 1, 4]);