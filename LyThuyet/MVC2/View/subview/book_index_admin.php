<div id="info">
		<?php
	 	if (isset($_SESSION['info'])) echo $_SESSION['info'];
	 	unset($_SESSION['info']);
	  ?>
</div>
	<form action="index.php?controller=CBook&action=insert" method="post" enctype="multipart/form-data">
		<table align="center">
		<tr>
			<td colspan="2" align="center">Thêm sách</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>
				<input type="text" name="book_id">
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="book_name">
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				<input type="text" name="description">
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
				<input type="text" name="price">
			</td>
		</tr>
		<tr>
			<td>Publisher</td>
			<td>
				<select name="pub_id">
				<?php
					foreach ($data_pub as $key => $value) 
					{
					?>
					<option value="<?php echo $value['pub_id'] ?>">
						<?php echo $value['pub_name'] ?>
					</option>
					<?php	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Category</td>
			<td>
				<select name="cat_id" id="">
					<?php
					foreach ($data_cat as $key => $value) 
					{
					?>
					<option value="<?php echo $value['cat_id'] ?>">
						<?php echo $value['cat_name'] ?>
					</option>
					<?php	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td>
				<input type="file" name="img">
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
				<td><?php echo $value['book_id'] ?></td>
				<td><?php echo $value['book_name'] ?></td>
				<td><?php echo $value['price'] ?></td>
				<td>
					<img src="<?php echo BASE_URL ?>/image/book/<?php echo $value['img'] ?>">
				</td>
				<td> <a href="<?php echo BASE_URL ?>/chi-tiet-
					<?php echo chuanHoaChuoi($value['book_name']) ?>-<?php echo $value['book_id'] ?>.html">Chi tiet</a> </td>
			</tr>
			<?php
		}
	?>
	</table>