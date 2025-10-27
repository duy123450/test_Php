<?php
$a = random_int(1, 10);
$b = random_int(1, 10);
$c = random_int(1, 10);

echo $a . "x<sup>2</sup> + " . $b . "x + " . $c . "= 0";

$delta = $b * $b - 4 * $a * $c;
if($delta > 0) {
    // Hai nghiêm phân biệt
    $x1 = (-$b + sqrt($delta)) / (2 * $a);
    $x2 = (-$b - sqrt($delta)) / (2 * $a);
    echo "<br>Hai nghiệm phân biệt là: x1 = $x1 và x2 = $x2";
} elseif($delta = 0) {
    // Nghiệm kép
    $x = -$b / (2 * $a);
    echo "<br>Phương trình có nghiệm kép: x = $x";
} else {
    // Phương trình vô nghiệm
    echo "<br>Phương trình vô nghiệm";
}