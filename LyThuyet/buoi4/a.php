<?php
# Tao
$m = ['x' => 1, 'y' => 2];

# Truy xuat
$n1 = $m['x'];

# Phep toan
// Ktra ton tai             // Them                 // Xoa
$n2 = isset($m['z']);       $m['k'] = 20;           unset($m['y']);

# Duyet
foreach($m as $v1 => $v2)
    echo "$v1-$v2<br>";

$m2 = [
    'x' => [1, 3],
    'y' => [2, 4]
];

$m3 = $m2['y'][1]; // 4