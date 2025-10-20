<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 4_5</title>
</head>

<body>
<?php
	// include("lab2_5a.php");
	include("lab2_5b.php");

	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo "</br>4.5. Màn hình xuất kq là 10. 
	Nhưng báo lỗi vì biến x chưa được khởi tạo. 
	Dòng include duy nhất, x chưa tồn tại, x += 10; 
	tương đương x = null + 10 => x = 10";
?>
</body>
</html>