<?php
function F7(&$a, $b = 3, $c = 2) {
    $a = [$b, $c];
}
$a = [1, 2, 3, 7];
F7($a, 4);
echo "<br>7. ";
foreach ($a as $v) 
    echo $v;