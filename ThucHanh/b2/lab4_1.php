<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab4_1</title>
</head>

<body>
<?php
$a=1;
$kq=0;
function f()
{
	global $b, $kq, $a;
	$b = 2;
	$kq = $a + $b;
}
f();
echo "a = $a<br/>";
echo "b = $b<br/>";
echo "kq = $kq<br/>";
echo "4.1. Xoá bỏ global kq=0 => không hỗ trợ trình duyệt bên ngoài";

?>
</body>
</html>