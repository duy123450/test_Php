<pre><?php
$s = $_SERVER['SCRIPT_FILENAME'];
echo "File nay luu tai: $s";
if(isset($_SERVER['QUERY_STRING']))
    echo "<br>Query string: " . $_SERVER['QUERY_STRING'] . "<br>";
print_r($_SERVER);