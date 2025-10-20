<ul id=menu>
	<li><a href="index.php">Trang chủ</a></li>
	<li><a href="index.php?controller=Book&action=show">Sách</a></li>
	<li><a href="#">Liên hệ</a></li>
	<li><a href="">Menu 4</a></li>
	<li><a href="">Menu 5</a></li>
	<?php
	if (isset($_SESSION['user_login']))
	{
		?>
		<li><a href="">Chào: <?php echo $_SESSION['user_login']['name'] ?></a></li>
		<li><a href="index.php?controller=Login&action=logout">Đăng xuất </a></li>
		<?php
	}
	else
		{
			?>
			<li><a href="index.php?controller=Login">Đăng nhập</a></li>
			<li><a href="#">Đăng ký</a></li>
		<?php
		}
		?>
</ul>
