<?php
include 'functions.php';
$x = get("x", 9);
$y = req("y", 3);
$z = req("D", 4);
echo "x= $x, y= $y, z= ";
if(is_array($z))
    foreach($z as $n => $m)
        echo $m;
else
    echo $z;