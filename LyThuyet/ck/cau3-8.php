<a href="cau3-8.php">0</a>
<a href="cau3-8.php?x=2&Y=2&z[]=3&Y=5&x=3">1</a>

<?php
$x8 = isset($_REQUEST['x']) ? $_REQUEST['x'] : -1;
$y8 = $_GET['Y'] ?? -4;
$z8 = isset($_REQUEST['z']) ? $_REQUEST['z'][0] : -6;
echo "<br>8. $x8-$y8-$z8"; // 8. 3-5-3