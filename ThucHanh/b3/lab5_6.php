<?php
function xoaKhoangTrang($str)
{
    return str_replace(' ', '', $str);
}

echo xoaKhoangTrang("hoc php can ban");