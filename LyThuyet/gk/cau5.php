<?php
function F5()
{
    $a = [2, 0, 3, 1];
    $s = 3;
    for ($i = 0; $i < count($a); $i++)
        if (isset($a[$a[$i]]))
            $s *= $a[$a[$i]];
    echo $s;
}
echo "<br>5. ";
F5();