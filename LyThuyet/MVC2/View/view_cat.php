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
	<div id="info"><?php
	
	 if (isset($_SESSION['info'])) echo $_SESSION['info'];
	 unset($_SESSION['info']);
	  ?></div>
	<form action="index.php?controller=CCategory&action=insert" method="post" enctype="multipart/form-data">
		<table align="center">
		<tr>
			<td colspan="2" align="center">Thêm Category</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>
				<input type="text" name="cat_id">
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="cat_name">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Submit">
			</td>
			
		</tr>
	</table>
</form>

	<table id='book' align="center">
	<?php  
		foreach ($data as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['cat_id'] ?></td>
				<td><?php echo $value['cat_name'] ?></td>
				
				<td> 
					<a href="index.php?controller=CCategory&action=edit&cat_id=<?php echo $value['cat_id'] ?>">Sửa</a>
					<a href="index.php?controller=CCategory&action=delete&cat_id=<?php echo $value['cat_id'] ?>">Xóa</a> 
				</td>
			</tr>
			<?php
		}
	?>
	</table>
</body>
</html>