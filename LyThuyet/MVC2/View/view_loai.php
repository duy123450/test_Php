<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php?controller=loai&action=them">
		Ma loai<input type="text"> <br>
		Ten Loai<input type="text"> <br>
		<input type="submit">
	</form>

	<table>
		<tr>
			<td>stt</td>
			<td>Maloai</td>
			<td>ten loai</td>
			<td>Thao tac</td>
		</tr>
		<?php
		foreach ($data as $key => $value) 
		{
		?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['cat_id'] ?></td>
			<td><?php echo $value['cat_name'] ?></td>
			<td>---</td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>