<?php
function sumDigitsInString($str){
    $s = 0;
    for($i = 0; $i < strlen($str); $i++)
        if(is_numeric($str[$i]))
            $s += $str[$i];
    return $s;
}

$str = "ngay15thang7nam2015";
echo "Tong cac chu so co trong chuoi: " .
sumDigitsInString($str);