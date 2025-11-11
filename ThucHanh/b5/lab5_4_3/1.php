<?php
if(isset($_POST['username'])){
    echo "Ten dang nhap: " . htmlspecialchars($_POST['username']);
    echo "<br>";
}

if(isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password']){
    echo "Password: " . htmlspecialchars($_POST['password']);
    echo "<br>";
} else {
    echo "Password ko trung";
    echo "<br>";
}

if(isset($_POST['gender'])){
    echo "Gioi tinh: " . htmlspecialchars(($_POST['gender'])) === 'Nam' ? 'Nam' : 'Nu';
    echo "<br>";
}

if(isset($_POST['hobbies'])){
    echo "So thich: " . nl2br(htmlspecialchars($_POST['hobbies']));
    echo "<br>";
}

$arrImg = array("image/jpg", "image/png", "image/bmp", "image.gif");
$errFile = $_FILES["image"]["error"];
$err = "";
if ($errFile > 0)
	$err .= "Lỗi file hình <br>";
else {
	$type = $_FILES["image"]["type"];
	if (!in_array($type, $arrImg))
		$err .= "Không phải file hình <br>";
	else {
		$temp = $_FILES["image"]["tmp_name"];
		$name = $_FILES["image"]["name"];
		if (!move_uploaded_file($temp, "image/" . $name))
			$err .= "Không thể lưu file<br>";
	}
}

if(isset($_POST['province'])){
    echo "Tinh: ";
    if(is_array($_POST['province'])){
        echo implode($_POST['province']); 
    }
} else {
    echo "Chưa chọn tinh. ";
}