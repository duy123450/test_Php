<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_1</title>
</head>

<body>
<?php
	//Sử dụng while
	$i=1;
	$s2=0;
	while($i<=100)
	{
		$s2+=$i;
		$i++;
        if ($s2 > 1000)
            break;
	}
	echo "Tính bằng WHILE, S2 = $s2 <br/>";
 ?>
</body>
</html> 