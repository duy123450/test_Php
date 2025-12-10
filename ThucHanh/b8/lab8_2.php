<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab8_2- PDO - Mysql - select - insert - parameter </title>
</head>

<body>
<?php
// Bắt đầu khối try-catch để xử lý lỗi kết nối cơ sở dữ liệu
try{
    // Tạo một đối tượng PDO để kết nối đến cơ sở dữ liệu MySQL
    // "mysql:host=localhost; dbname=qlsach" - Chuỗi DSN (Data Source Name)
    // "root" - Tên người dùng
    // "" - Mật khẩu
    $pdh = new PDO("mysql:host=localhost; dbname=qlsach", "root", "");
    // Thực hiện truy vấn để thiết lập bộ ký tự (charset) cho kết nối là 'utf8'
    $pdh->query("set names 'utf8'");
}
// Bắt khối catch để bắt ngoại lệ (Exception) nếu kết nối thất bại
catch(Exception $e){
    // In ra thông báo lỗi
    echo $e->getMessage();
    // Dừng việc thực thi script
    exit;
}
// Định nghĩa giá trị cần tìm kiếm
$search= "a";
// Định nghĩa câu truy vấn SQL với Placeholder (tham số định danh) `:ten`
// Sử dụng Prepared Statement để ngăn chặn SQL Injection
$sql ="select * from publisher where pub_name like :ten ";
// Chuẩn bị (prepare) câu truy vấn SQL
$stm = $pdh->prepare($sql);
// Gán giá trị cho tham số định danh `:ten`
// Thêm dấu % vào đầu và cuối để thực hiện tìm kiếm chuỗi con (LIKE %a%)
$stm->bindValue(":ten","%$search%");
// Thực thi câu truy vấn đã được chuẩn bị và gán giá trị
$stm->execute();
// Lấy tất cả các dòng kết quả và lưu vào mảng $rows
// PDO::FETCH_ASSOC - trả về mảng kết hợp (key là tên cột)
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
// Bắt đầu thẻ <pre> để in mảng kết quả một cách dễ đọc
echo "<pre>";
// In cấu trúc và nội dung của mảng kết quả
print_r($rows);
// Kết thúc thẻ </pre>
echo "</pre>";
// In một đường kẻ ngang để phân tách các phần
echo "<hr>";
?>
	<form action="lab8_2.php" method="get">
		Nhập tên loại: <input type="text" name="cat_name" id="">
		<input type="submit" name="submit" value="Tìm">
	</form>
	<?php

// Lấy giá trị của tham số "cat_name" từ URL (phương thức GET)
// Sử dụng toán tử null coalescing (??) (PHP 7+) để gán chuỗi rỗng nếu $_GET["cat_name"] không tồn tại
$cat_name = $_GET["cat_name"] ?? "";
// Lấy giá trị của tham số "submit" từ URL, dùng để xác định người dùng đã nhấn nút tìm kiếm chưa
$submit = $_GET["submit"] ?? "";
// Khởi tạo mảng $arr để lưu trữ kết quả tìm kiếm (ban đầu là mảng rỗng)
$arr = [];
// Kiểm tra xem nút submit tìm kiếm đã được nhấn hay chưa
if($submit){
    // Định nghĩa câu truy vấn SQL SELECT với Placeholder dấu chấm hỏi (?)
    // Tìm kiếm các bản ghi có cat_name chứa chuỗi con được cung cấp (LIKE)
    $sql = "select * from category where cat_name like ?";
    // Chuẩn bị (prepare) câu truy vấn SQL để bảo mật
    $stmt = $pdh->prepare($sql);
    // Thực thi câu truy vấn
    // Truyền giá trị "%$cat_name%" vào mảng để thay thế cho Placeholder, thêm % để tìm kiếm gần đúng (chứa chuỗi con)
    $stmt->execute(["%$cat_name%"]);
    // Lấy tất cả các dòng kết quả và lưu vào mảng $arr dưới dạng mảng kết hợp
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
 <!-- Bắt đầu mã HTML để tạo bảng, có viền -->
<table border="1">
     <!-- Hàng tiêu đề của bảng -->
    <tr>
        <th>Mã loại</th>
        <th>Tên loại</th>
    </tr>
    <?php
    // Bắt đầu khối PHP để chèn dữ liệu vào bảng
        // Kiểm tra xem mảng kết quả $arr có phần tử nào không (tìm thấy dữ liệu)
        if(count($arr)){
            // Lặp qua từng phần tử (dòng) trong mảng kết quả
            foreach($arr as $v){
                // Mở khối PHP để chèn mã HTML vào vòng lặp
                ?>
                 <!-- In một hàng mới cho mỗi bản ghi -->
                <tr>
                     <!-- In giá trị của cột "cat_id" -->
                    <td><?php echo $v["cat_id"] ?></td>
                     <!-- In giá trị của cột "cat_name" -->
                    <td><?php echo $v["cat_name"] ?></td>
                </tr>
                <?php
            }
        }
        // Đóng khối PHP
      ?>
</table>
<?php
// Kết thúc script PHP (không có nội dung sau cùng)
// Định nghĩa giá trị cho cột cat_id
// $ma="LS1";
// // Định nghĩa giá trị cho cột cat_name
// $ten = "Lịch sử";
// // Định nghĩa câu truy vấn SQL INSERT với Placeholders (tham số định danh)
// $sql="insert into category(cat_id, cat_name) values(:maloai, :tenloai)";
// // Tạo mảng chứa các tham số và giá trị tương ứng
// $arr = array(":maloai"=>$ma, ":tenloai"=>$ten);
// // Chuẩn bị (prepare) câu truy vấn SQL
// $stm= $pdh->prepare($sql);
// // Thực thi câu truy vấn đã được chuẩn bị, truyền mảng tham số vào
// $stm->execute($arr);
// // Lấy số lượng dòng bị ảnh hưởng bởi truy vấn (trong trường hợp INSERT là số dòng được thêm)
// $n = $stm->rowCount();
// // In ra thông báo số lượng loại sách đã được thêm thành công
// echo "Đã thêm $n loại sách";
?>

