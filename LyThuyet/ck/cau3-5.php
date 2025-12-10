<?php
function F5($n) {
    $a = [2, 1, 5];
    $a[] = $n;
    $s = 0;
    for ($i = 0; $i < count($a); $i++)
        if (isset($a[$a[$i]]))
            $s *= $a[$a[$i]];
    echo $s;
}
echo "<br>5. ";
F5(2);
//5. 0