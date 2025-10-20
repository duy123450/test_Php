<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sach</title>
	<style type="text/css">
		table#book img{width:80px;}
		form>table td{border-style: solid; border-color: red; border-spacing: 0px; border-width: 1px }
		form>table{width:40%; }
	</style>
</head>
<body>
	<div id="menu">
		<table width="100%" border="1">
			<tr>
				<td>
					<a href="index.php">Trang chủ</a>
				</td>
				<td>
					<a href="index.php?controller=CBook">Danh mục sách</a>
				</td>
				<td>
					<a href="index.php?controller=CCategory">Category</a>
				</td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
			</tr>
		</table>
	</div>
	
	<form action="index.php?controller=CCategory&action=update" method="post" enctype="multipart/form-data">
		<table align="center">
		<tr>
			<td colspan="2" align="center">Sửa Category</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>
				<input type="text" name="cat_id" value="<?php echo $data['cat_id'] ?>">
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="cat_name"  value="<?php echo $data['cat_name'] ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Submit">
			</td>
			
		</tr>
	</table>
</form>

</body>
</html>