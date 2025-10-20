<?php
$a = 1 + (rand() / getrandmax()) * (100 - 1);

// Kiểm tra biến $a là số nguyên hay số thực
if(is_int($a))
    echo $a . "là số nguyên.";
elseif(is_float($a))
    echo $a . " là số thực.";
else
    echo $a . " không phải là số nguyên hay số thực.";