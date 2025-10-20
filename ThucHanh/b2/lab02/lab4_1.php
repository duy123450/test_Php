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
	$GLOBALS['b']=2;
    // Xoa bo global kq=0 => khong ho tro trinh duyet ben ngoai
	$kq = 0;
	$kq=$GLOBALS['a']+$GLOBALS['b'];
}
f();
echo "a = $a<br/>";
echo "b = $b<br/>";
echo "kq = $kq<br/>";
echo "4.1. Xoá bỏ global kq=0 => không hỗ trợ trình duyệt bên ngoài";

?>
</body>
</html>