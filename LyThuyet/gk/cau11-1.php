<?php
include 'functions.php';
$x = req("x");
$y = post("Y", 2);
$z = req("D", 2);
echo "x= $x, y= $y, z= " . array_sum($z);