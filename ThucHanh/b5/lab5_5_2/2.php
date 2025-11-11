<?php
function postIndex($index, $value = "")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

$sm 	= postIndex("submit");
$ten 	= postIndex("ten");
$gt 	= postIndex("gt");
$arrImg = array("image/png", "image/jpeg", "image/bmp");

if ($sm == "") {
	header("location:1.php");
	exit; //quay ve 1.php
}

$err = "";
if ($ten == "") $err .= "Phải nhập tên <br>";
if ($gt == "") $err .= "Phải chọn giới tính <br>";

$arrImg = array("image/png", "image/jpeg", "image/bmp");
$err = "";

$arrImg = array("image/png", "image/jpeg", "image/bmp");
$err = "";
$uploadedFiles = []; 

if (!isset($_FILES['hinh']) || !is_array($_FILES['hinh']['name'])) {
    $err .= "Không có file nào được chọn.<br>";
} else {
    $totalFiles = count($_FILES['hinh']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        
        $errFile = $_FILES["hinh"]["error"][$i];
        $temp = $_FILES["hinh"]["tmp_name"][$i];
        $name = $_FILES["hinh"]["name"][$i];
        $type = $_FILES["hinh"]["type"][$i];

        if ($errFile == UPLOAD_ERR_NO_FILE) {
            continue; 
        }

        if ($errFile > 0) {
            $err .= "Lỗi file **{$name}** (Mã lỗi: {$errFile}) <br>";
        } elseif (!in_array($type, $arrImg)) {
            $err .= "File **{$name}** không phải là file hình ảnh hợp lệ. <br>";
        } else {
            $targetPath = "image/" . basename($name);
            
            if (move_uploaded_file($temp, $targetPath)) {
                $uploadedFiles[] = basename($name); 
            } else {
                $err .= "Không thể lưu file **{$name}** vào thư mục.<br>";
            }
        }
    }
}

?>
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lab5_3/2</title>
</head>

<body>
    <?php
    if (!empty($err)) {
        echo $err;
    } 
    else {
        if ($gt == "1") {
            echo "Chào Anh: $ten ";
        } else {
            echo "Chào Chị $ten ";
        }
        ?>
        
        <hr>
        
        <?php foreach ($uploadedFiles as $imageName) { ?>
            <img src="image/<?php echo $imageName; ?>" alt="<?php echo $imageName; ?>" style="max-width: 200px; margin: 5px;">
        <?php } ?>
        
        <?php
    }
    ?>
    <p>
        <a href="1.php">Tiếp tục</a>
    </p>
</body>

</html>