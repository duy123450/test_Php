<form action="index.php?controller=Login&action=dologin" method="post">
	<table>
		<tr>
			<td colspan="2">
				<?php 
				if (isset($_SESSION['flash'])) echo $_SESSION['flash'];
				else 'Nhập thông tin đăng nhập';
				unset($_SESSION['flash']);
				?>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="text" name="email">
			</td>
		</tr>
		<tr>
			<td>
				Mat khau
			</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="">
			</td>
			
		</tr>
	</table>
</form>