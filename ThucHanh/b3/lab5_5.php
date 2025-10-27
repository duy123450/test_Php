<?php
function tongSoTrongChuoi($str)
{
    preg_match_all('/\d+/', $str, $matches);
    $s = 0;
    foreach($matches[0] as $num)
        $s += (int)$num;
    return $s;
}

echo tongSoTrongChuoi("ngay15thang7nam2015");