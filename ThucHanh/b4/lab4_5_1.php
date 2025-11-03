<?php
echo "Pham Thai Duy - DH52200583 - D22_TH01 Nhom 09<hr>";
$a = array(12,23,34,45,56);

function showArray($arr){
    echo "<table border=1 cellspacing=0>
    <tr><th>Index</th><th>Value</th></tr>";
    foreach($arr as $key => $value){
        echo "<tr align=center><td>" . $key . "</td><td>" . $value . "</td></tr>";
    }
    echo "</table>";
}

showArray($a);