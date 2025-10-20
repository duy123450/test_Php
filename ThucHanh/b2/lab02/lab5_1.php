<?php
// Khai báo biến $a và $b. Cho ngẫu nhiên giá trị của 2 biến
$a = random_int(1, 100);
$b = random_int(1, 99);
echo $a . ", " . $b;

// Phần nguyên và phân dư của $a / $b
echo "<br>Phần nguyên: " . intdiv($a, $b);
echo "<br>Phần dư: " . $a % $b;