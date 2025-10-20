<form action="index.php?controller=Admin&action=updatebook" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Ma sach</td>
			<td>
				<input type="text" name="book_id" value="<?php echo $data['book_id'] ?>">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="text" name="book_name" value="<?php echo $data['book_name'] ?>">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<textarea name="description"><?php echo $data['description'] ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="text" name="price" value="<?php echo $data['price'] ?>">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<select name="cat_id">
					<?php 
					foreach ($data_cat as $key => $value) {
					?>
					<option value="<?php echo $value['cat_id'] ?>"><?php echo $value['cat_name'] ?></option>
					<?php	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<select name="pub_id">
					<?php 
					foreach ($data_pub as $key => $value) {
					?>
					<option value="<?php echo $value['pub_id'] ?>"><?php echo $value['pub_name'] ?></option>
					<?php	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="file" name="img">
			</td>
			<td>
				<img src="<?php echo BASE_URL ?>/images/book/<?php echo $data['img'] ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="">
			</td>
		</tr>
	</table>
</form>