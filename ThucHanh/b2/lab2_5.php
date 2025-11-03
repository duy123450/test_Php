<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 2_5</title>
</head>

<body>
<?php
	// include("lab2_5a.php");
	
	echo "Khi comment dòng 10 trong lab2_5a.php lại thì sẽ báo lỗi<br/>";
	echo "File lab2_5a.php không được nhúng vào, nên biến $x không được tạo.";
	
	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
?>
</body>
</html>