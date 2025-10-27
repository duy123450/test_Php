<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 4_7</title>
</head>

<body>
<?php
	// require("lab2_5a.php");
	require("lab2_5b.php");
	require_once("lab2_5b.php");

	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo "</br>Cũng giống như file lab4_7.php, cho kết quả giống nhau. 
	Màn hình xuất kq là 10 thay vì 20. 
	Nhưng báo lỗi vì biến x chưa được khởi tạo. 
	require_once giông như require, nhưng file chỉ được 
	bao gồm 1 lần duy nhất.";
?>
</body>
</html>