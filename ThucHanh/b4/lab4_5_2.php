<?php
echo "Pham Thai Duy - DH52200583 - D22_TH01 Nhom 09<hr>";

$arr= array();
$r = array("id"=> "sp1", "name "=> "Sản phẩm 1 ");
$arr[] = $r;
$r = array("id"=> "sp2", "name "=> "Sản phẩm 2 ");
$arr[] = $r;
$r = array("id"=> "sp3", "name "=> "Sản phẩm 3 ");
$arr[] = $r;

function showMatrix($a){
    echo "<table border=1 cellspacing=0 cellpadding=3>
    <tr><th>Stt</th><th>Ma sp</th><th>Ten sp</th></tr>";
    $i = 0;
    for ($i = 0; $i < count($a); $i++){
        echo "<tr><td>" . ($i+1) . "</td><td>" . $a[$i]['id'] . "</td><td>" . $a[$i]['name '] . "</td></tr>";
    }
    echo "</table>";
}

showMatrix($arr);