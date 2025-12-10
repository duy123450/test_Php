<?php
$a = ["3" => 3, "1" => 1, 5];
$a[] = 6;
$b = array_keys($a);
echo array_sum($b); // 13