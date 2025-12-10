<?php
// Bắt đầu khối try-catch để xử lý lỗi kết nối cơ sở dữ liệu
try{
    // Tạo một đối tượng PDO để kết nối đến cơ sở dữ liệu MySQL
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
// Lấy giá trị của tham số "cat_id" từ URL (phương thức GET)
// Sử dụng toán tử ternary (ba ngôi) để kiểm tra: nếu tồn tại $_GET["cat_id"] thì lấy giá trị đó,
// nếu không tồn tại (NULL) thì gán là chuỗi rỗng ""
$cat_id = isset($_GET["cat_id"])?$_GET["cat_id"]:"";
// Định nghĩa câu truy vấn SQL DELETE với Placeholder (tham số định danh) `:cat_id`
$sql ="delete from category where cat_id = :cat_id ";
// Tạo mảng chứa tham số và giá trị tương ứng (cat_id lấy từ URL)
$arr = array(":cat_id"=>$cat_id);
// Chuẩn bị (prepare) câu truy vấn SQL để bảo mật
$stm = $pdh->prepare($sql);
// Thực thi câu truy vấn đã được chuẩn bị, truyền mảng tham số vào
$stm->execute($arr);
// Lấy số lượng dòng bị ảnh hưởng bởi truy vấn (số dòng bị xóa)
$n = $stm->rowCount();
// Kiểm tra nếu có dòng nào bị xóa thành công (n > 0)
if ($n>0) {
    // Gán thông báo thành công
    $thongbao="Da xoa $n loai sach! ";
}
else {
    // Gán thông báo thất bại (có thể do cat_id không tồn tại hoặc lỗi khóa ngoại)
    $thongbao="Loi xoa!";
}
?>
<script language="javascript">
// Bắt đầu khối mã JavaScript
// Hiển thị thông báo (thành công hoặc thất bại) bằng hộp thoại alert
alert("<?php echo $thongbao;?>");
// Chuyển hướng người dùng về trang "lab8_3.php" sau khi hiển thị thông báo
window.location = "lab8_3.php";
</script>