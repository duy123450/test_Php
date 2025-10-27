<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 4_4</title>
</head>

<body>
<?php
	// include("lab2_5a.php");
	

	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo "</br>4.4. Biến x không tồn tại vì lệnh isset(x) 
	không kiểm tra không ra biến x có giá trị, 
	lệnh include ở dòng 10 dùng để bao gồm file lab2_5a.php. 
	File đó chứa các biến và function có thể có liên quan tới biến x.";
?>
</body>
</html>