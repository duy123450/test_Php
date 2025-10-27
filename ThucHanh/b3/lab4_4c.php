<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lab 3_5</title>
	<style>
		#banco {
			border: solid;
			padding: 15px;
			background: #E8E8E8
		}

		#banco .cellBlack {
			width: 50px;
			height: 50px;
			background: black;
			float: left;
		}

		#banco .cellWhite {
			width: 50px;
			height: 50px;
			background: white;
			float: left
		}

		.clear {
			clear: both
		}
	</style>
</head>

<body>
	<?php
    include_once "function.php";
	/*
bảng cửu chương $n, màu nền $color
- Input: $n là một số nguyên dương (1->10)
		 $color: Tên màu nền.Mặc định là green
- Output: Bảng cửu chương, được xuât trong hàm
*/
	
	/*
Hàm in ra bàn cờ vua với màu các ô thay đổi và được định nghĩa trong css: cellBlack, cellWhite
- Input: $size: kích thước bàn cờ: là 1 số nguyên dương (mặc định là 8)
- Output: bàn cờ HTML 

*/
	aggregateFunctions();
	?>
</body>

</html>