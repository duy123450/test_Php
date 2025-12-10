<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Bắt đầu khối try-catch để xử lý lỗi kết nối cơ sở dữ liệu
    try {
        // Tạo đối tượng PDO để kết nối đến cơ sở dữ liệu MySQL (qlsach)
        $pdh = new PDO("mysql:host=localhost; dbname=qlsach", "root", "");
        // Thiết lập bộ ký tự cho kết nối là 'utf8'
        $pdh->query("set names 'utf8'");
    }
    // Bắt khối catch để bắt ngoại lệ nếu kết nối thất bại
    catch (Exception $e) {
        // In ra thông báo lỗi
        echo $e->getMessage();
        // Dừng việc thực thi script
        exit;
    }
    // Lấy giá trị của tham số "cat_id" từ URL (phương thức GET)
    // Sử dụng toán tử null coalescing (??) (PHP 7+) để gán chuỗi rỗng nếu $_GET["cat_id"] không tồn tại
    $ma = $_GET["cat_id"] ?? "";
    // Kiểm tra xem $ma (cat_id) có giá trị hay không
    if ($ma) {
        // Định nghĩa câu truy vấn SELECT để lấy tên loại sách dựa trên mã loại
        // Sử dụng Placeholder dấu chấm hỏi (?)
        $sql = "select cat_name from category where cat_id = ?";
        // Chuẩn bị (prepare) câu truy vấn SQL
        $stmt = $pdh->prepare($sql);
        // Thực thi câu truy vấn, truyền giá trị $ma vào mảng để thay thế cho Placeholder
        $stmt->execute([$ma]);
        // Lấy dòng kết quả đầu tiên và lưu vào mảng $arr dưới dạng mảng kết hợp
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Lấy giá trị cat_name từ mảng $arr (nếu có) hoặc gán chuỗi rỗng nếu không tìm thấy
    $name = $arr["cat_name"] ?? "";
    ?>

    <form action="lab8_32.php" method="post">
        Mã loại:<input type="text" name="cat_id" value="<?php echo $ma ?>" required readonly>
        Tên loại: <input type="text" name="cat_name" value="<?php echo $name ?>" required  >
        <input type="submit" name="submit" value="Sửa">
    </form>

    <?php
    // Lấy dữ liệu từ form POST sau khi người dùng nhấn nút "Sửa"
    $cat_id = $_POST["cat_id"] ?? "";
    $cat_name = $_POST["cat_name"] ?? "";
    $submit = $_POST["submit"] ?? "";
    // Kiểm tra xem form đã được submit hay chưa (nút submit có tên là "submit")
    if ($submit) {
        // Định nghĩa câu truy vấn SQL UPDATE với Placeholders dấu chấm hỏi (?)
        $sql = "update category set cat_name = ? where cat_id = ?";
        // Chuẩn bị (prepare) câu truy vấn SQL
        $stmt = $pdh->prepare($sql);
        // Thực thi câu truy vấn, truyền các giá trị mới theo thứ tự của Placeholders
        // Thứ tự: [cat_name (giá trị mới), cat_id (điều kiện)]
        $stmt->execute([$cat_name, $cat_id]);
        // Lấy số lượng dòng bị ảnh hưởng bởi truy vấn (số dòng được cập nhật)
        $row = $stmt->rowCount();
        // Kiểm tra nếu có dòng nào được cập nhật thành công (row > 0)
        if ($row > 0) {
            // Mở khối PHP để chèn mã JavaScript thông báo
    ?>
            <script>
                // Hiển thị thông báo thành công
                alert("Cập nhật thành công");
                // Chuyển hướng người dùng về trang liệt kê (lab8_3.php)
                window.location = "lab8_3.php";
            </script>
        <?php
        } else {
            // Xử lý trường hợp không có dòng nào bị ảnh hưởng (dữ liệu không thay đổi hoặc lỗi)
        ?>
            <script>
                // Hiển thị thông báo lỗi
                alert("Lỗi cập nhật");
            </script>
    <?php
        }
    }
    ?>
</body>

</html>