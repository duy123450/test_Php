<form action="" method="post" enctype="multipart/form-data">
    File: <input type="file" name="x"><br>
    <button type="submit">Submit</button>
</form>
<!-- Xu ly upload -->
<?php
# $_FILES['name']: name, type, size, error: 0->4, tmp_name

if (isset($_FILES['x'])) {
    $f = $_FILES['x'];
    if ($f['error'] == 0) { // OK
        # Xu ly file upload o day
        // cac loai hop le
        $a = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/jfif'];
        $ten = $f['name'];
        $loai = $f['type'];
        echo "Loai = $loai";
        if (in_array($loai, $a)) {
            # File hop le
            // - Save file: move_uploaded_file(Nguon, dich);
            $tam = $f['tmp_name']; // Nguon
            move_uploaded_file($tam, 'hinh/' . $ten);
            echo "<img src='hinh/$ten' />";
        } else {
            echo "Khong phai file hinh";
        }
    } else {
        # Bao loi
        echo "Loi upload: " . $f['error'];
    }
}
