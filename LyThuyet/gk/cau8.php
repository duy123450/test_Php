<a href="./cau8.php?x=3&Y=2&z[]=3&Y=3&y=3">1</a> 
<a href="./cau8.php">Main</a>
<pre>
    <?php
    $x8 = isset($_GET['x']) ? $_GET['x'] : -1;
    $y8 = $_POST['y'] ?? -5;
    $z8 = isset($_REQUEST['z']) ? $_REQUEST['z'][0] : -6;
    echo "8. $x8 - $y8 - $z8";