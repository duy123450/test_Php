<?php
function ktraDoiXung($str)
{
    $str = strtolower(str_replace(' ','',$str));
    $reversed_str = strrev($str);
    if ($str === $reversed_str)
        return true;
    else
        return false;
}

$str = 'abccba';
if(ktraDoiXung($str))
    echo "'$str' la chuoi doi xung";
else
    echo "'$str' khong phai la chuoi doi xung";
