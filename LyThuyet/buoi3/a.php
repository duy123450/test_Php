<?php
// mang rong
$m1 = array();
$m2 = [];

$m3 = array(1, 3, 5);
$m4 = [1, 3, 5];
$m5 = array('x' => 2, 'y' => 4);
$m6 = ['x' => 2, 'y' => 4];

// debug mang
echo '<pre>';
print_r($m5);
var_dump($m6);

// truy xuat
$n1 = $m3[1];                           //3
$n2 = $m5['y'];                         //4

// ktra ton tai
$n3 = isset($m4[4]) ? $m4[4] : 10;     //10
$n4 = $m5['z'] ?? 2;                    //2

// xoa
unset($m5['x']);

// them
$m6['z'] = 7;
$m6['y'] = 6;

// dem so ptu
count($m6);                             //3

// duyet mang
for ($i = 0; $i < count($m3); $i++)
    echo "<br>ptu $i = {$m3[$i]}";
foreach ($m3 as $k => $v)
    echo "<br> $k - $v";