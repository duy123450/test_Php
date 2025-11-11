<?php
// Xử lý dữ liệu khi form được submit
$isPosted = $_SERVER['REQUEST_METHOD'] === 'POST';

$name = $isPosted ? filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
$email = $isPosted ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) : '';
$gender = $isPosted ? filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
$country = $isPosted ? filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
$bio = $isPosted ? filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
// checkbox đơn
$subscribe = $isPosted && isset($_POST['subscribe']) ? 'yes' : 'no';
// checkbox nhiều giá trị (array)
$interests = $isPosted && isset($_POST['interests']) && is_array($_POST['interests'])
	? array_map('htmlspecialchars', $_POST['interests'])
	: [];

function esc($v)
{
	return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<title>Ví dụ 5_2 - Form giữ giá trị sau submit</title>
	<style>
		label {
			display: block;
			margin-top: 8px;
		}

		.result {
			background: #f7f7f7;
			padding: 10px;
			margin-top: 12px;
			border: 1px solid #ddd;
		}
	</style>
</head>

<body>
	<h1>Ví dụ 5_2 — Form và kết quả cùng file</h1>

	<?php if ($isPosted): ?>
		<div class="result">
			<h2>Kết quả đã submit</h2>
			<p><strong>Tên:</strong> <?= esc($name) ?: '<em>(không có)</em>' ?></p>
			<p><strong>Email:</strong> <?= esc($email) ?: '<em>(không có)</em>' ?></p>
			<p><strong>Giới tính:</strong> <?= esc($gender) ?: '<em>(không có)</em>' ?></p>
			<p><strong>Quốc gia:</strong> <?= esc($country) ?: '<em>(không có)</em>' ?></p>
			<p><strong>Sở thích:</strong>
				<?php if (!empty($interests)): ?>
					<?= implode(', ', array_map('esc', $interests)) ?>
				<?php else: ?>
					<em>(không có)</em>
				<?php endif; ?>
			</p>
			<p><strong>Đăng ký nhận tin:</strong> <?= $subscribe === 'yes' ? 'Có' : 'Không' ?></p>
			<p><strong>Giới thiệu:</strong><br><?= nl2br(esc($bio)) ?: '<em>(không có)</em>' ?></p>
		</div>
	<?php endif; ?>

	<form method="post" action="<?= esc($_SERVER['PHP_SELF']) ?>">
		<label>
			Tên:
			<input type="text" name="name" value="<?= esc($name) ?>">
		</label>

		<label>
			Email:
			<input type="email" name="email" value="<?= esc($email) ?>">
		</label>

		<label>Giới tính:</label>
		<label><input type="radio" name="gender" value="male" <?= $gender === 'male' ? 'checked' : '' ?>> Nam</label>
		<label><input type="radio" name="gender" value="female" <?= $gender === 'female' ? 'checked' : '' ?>> Nữ</label>
		<label><input type="radio" name="gender" value="other" <?= $gender === 'other' ? 'checked' : '' ?>> Khác</label>

		<label>
			Quốc gia:
			<select name="country">
				<option value="">-- Chọn --</option>
				<option value="vn" <?= $country === 'vn' ? 'selected' : '' ?>>Việt Nam</option>
				<option value="us" <?= $country === 'us' ? 'selected' : '' ?>>Hoa Kỳ</option>
				<option value="jp" <?= $country === 'jp' ? 'selected' : '' ?>>Nhật Bản</option>
			</select>
		</label>

		<label>Sở thích:</label>
		<label><input type="checkbox" name="interests[]" value="code" <?= in_array('code', $interests) ? 'checked' : '' ?>> Lập trình</label>
		<label><input type="checkbox" name="interests[]" value="music" <?= in_array('music', $interests) ? 'checked' : '' ?>> Âm nhạc</label>
		<label><input type="checkbox" name="interests[]" value="sports" <?= in_array('sports', $interests) ? 'checked' : '' ?>> Thể thao</label>

		<label><input type="checkbox" name="subscribe" value="1" <?= $subscribe === 'yes' ? 'checked' : '' ?>> Đăng ký nhận bản tin</label>

		<label>
			Giới thiệu (textarea):
			<textarea name="bio" rows="5" cols="40"><?= esc($bio) ?></textarea>
		</label>

		<p><button type="submit">Gửi</button> <button type="reset">Xóa</button></p>
	</form>
</body>

</html>