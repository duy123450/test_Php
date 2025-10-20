<?php
function F1(){
    echo 'Hello World!';
}

function F2($x1, $x2){
    $n = $x1 + $x2;
    return $n;
}

function F3($x1, $x2 = 2){
    $n = $x1 + $x2;
    ?><h1>n = <?php echo $n; ?></h1>
    <?php
}

function F4($a = 1, $b = 2){
    return $a * $b;
}

function F5(&$a, $b){
    $s = $a + $b;
    $a = 0; $b = 0;
    return $s;
}