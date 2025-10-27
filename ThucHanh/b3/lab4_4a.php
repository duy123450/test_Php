<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_5</title>
<style>
	#banco{border:solid; padding:15px; background:#E8E8E8}
	#banco .cellBlack{width:50px; height:50px; background:black; float:left; }
	#banco .cellWhite{width:50px; height:50px; background:white; float:left}
	.clear{clear:both}
</style>
</head>

<body>
<?php
/*
bảng cửu chương $n, màu nền $color
- Input: $n là một số nguyên dương (1->10)
		 $color: Tên màu nền.Mặc định là green
- Output: Bảng cửu chương, được xuât trong hàm
*/
function BCC($n, $color="green", $color1="gray", $color2="blue")
{
	?>
	<table>
	<tr><td colspan="3" bgcolor="<?php echo $color;?>">
    Bảng cửu chương <?php echo $n;?></td></tr>
	<?php
		for($i=1; $i<=10; $i++)
		{
            $rowColor = ($i % 2 == 1) ? $color1 : $color2;
			?>
			<tr bgcolor="<?php echo $rowColor; ?>">
                <td><?php echo $n;?></td>
				<td><?php echo $i;?></td>
				<td><?php echo $n*$i;?></td>
			</tr>
			<?php
		}
		?>
		</table>
	<?php	
}

Bcc(6,"red");	
?>
</body>
</html>