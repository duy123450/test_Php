<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 4_6</title>
</head>

<body>
<?php
	// include("lab2_5a.php");
	include("lab2_5b.php");
	include("lab2_5b.php");

	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo "</br>4.6. Màn hình xuất kq là 20. 
	Nhưng báo lỗi vì biến x chưa được khởi tạo. 
	Dòng include thứ nhất, x chưa tồn tại, x += 10; 
	tương đương x = null + 10 => x = 10. 
	Dòng include thứ 2, vì x = 10, nên x += 10 => x = 20.";

	echo "</br></br>4.9. Lệnh include sẽ bao gồm file, 
	nhưng nếu file không tồn tại, nó sẽ tạo ra 1 cảnh báo 
	nhưng vẫn tiếp tục chạy."
?>
</body>
</html>