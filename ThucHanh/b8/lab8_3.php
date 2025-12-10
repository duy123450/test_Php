<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý loại sách</title>
<style>
#container{width:600px; margin:0 auto;}
</style>
</head>

<body>
<div id="container">

<form action="lab8_3.php" method="post">
<table>
<tr><td>Mã loại:</td><td><input type="text" name="cat_id" /></td></tr>
<tr><td>Tên loại:</td><td><input type="text" name="cat_name" /></td></tr>
<tr><td colspan="2"> <input type="submit" name="sm" value="Insert" /></td></tr>
</table>
</form>
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
// Kiểm tra xem nút submit form có tên là "sm" đã được nhấn hay chưa
if (isset($_POST["sm"]))
{
    // Định nghĩa câu truy vấn SQL INSERT với Placeholders (tham số định danh)
    $sql="insert into category(cat_id, cat_name) values(:cat_id, :cat_name) ";
    // Tạo mảng chứa các tham số và giá trị tương ứng, lấy từ dữ liệu form POST
    $arr = array(":cat_id"=>$_POST["cat_id"], ":cat_name"=>$_POST["cat_name"]);
    // Chuẩn bị (prepare) câu truy vấn SQL để bảo mật
    $stm= $pdh->prepare($sql);
    // Thực thi câu truy vấn đã được chuẩn bị, truyền mảng tham số vào
    $stm->execute($arr);
    // Lấy số lượng dòng bị ảnh hưởng bởi truy vấn (số dòng được thêm)
    $n = $stm->rowCount();
    // Kiểm tra nếu có dòng nào được thêm thành công (n > 0)
    if ($n>0) {
        // In thông báo thành công
        echo "Đã thêm $n loại ";
    }
    else {
        // In thông báo thất bại (có thể do trùng khóa chính hoặc lỗi khác)
        echo "Lỗi thêm ";
    }
}
// Chuẩn bị (prepare) câu truy vấn SQL để lấy tất cả dữ liệu từ bảng category
$stm = $pdh->prepare("select * from category");
// Thực thi câu truy vấn
$stm->execute();
// Lấy tất cả các dòng kết quả và lưu vào mảng $rows dưới dạng mảng kết hợp
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
// Định nghĩa câu truy vấn SQL SELECT để lấy tất cả các cột và dòng từ bảng 'publisher'
$sql1 = "select * from publisher";
// Chuẩn bị (prepare) câu truy vấn SQL (là một thói quen tốt, ngay cả khi không có tham số)
$stmt = $pdh->prepare($sql1);
// Thực thi câu truy vấn đã được chuẩn bị
$stmt->execute();
// Lấy tất cả các dòng kết quả và lưu vào mảng $publishers
// PDO::FETCH_ASSOC - trả về mảng kết hợp (key là tên cột)
$publishers = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Định nghĩa câu truy vấn SQL phức hợp (JOIN)
// Câu truy vấn chọn:
// - book_id, book_name, price từ bảng 'book' (b)
// - cat_name từ bảng 'category' (c)
// - pub_name từ bảng 'publisher' (p)
$sql2 = "select b.book_id, b.book_name, b.price, c.cat_name, 
p.pub_name from publisher p inner join book b on p.pub_id = b.pub_id inner join category c on b.cat_id = c.cat_id";
// Chuẩn bị (prepare) câu truy vấn SQL JOIN
$stmt = $pdh->prepare($sql2);
// Thực thi câu truy vấn
$stmt->execute();
// Lấy tất cả các dòng kết quả và lưu vào mảng $books
// Mảng này chứa chi tiết sách cùng với tên đầy đủ của Loại sách và Nhà xuất bản
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
?>
<table>
    <tr>
        <td>mã loại</td>
        <td>tên loại</td>
        <td>Thao tác</td>
    </tr>
<?php
// Lặp qua mảng các dòng kết quả ($rows)
foreach($rows as $row)
{
    // Mở khối PHP để chèn mã HTML vào vòng lặp
    ?>
    <tr>
        <td><?php echo $row["cat_id"];?></td>
        <td><?php echo $row["cat_name"];?></td>
        <td><a href='lab8_32.php?cat_id=<?php echo $row["cat_id"];?>'>Sửa</a></td>
        <td><a href='lab8_31.php?cat_id=<?php echo $row["cat_id"];?>'>Xóa</a></td>
    </tr>
    <?php
}
$masach = $_GET["masach"] ?? "";
$arr = [];
if($masach){
	$sql3 = "select book_name, price from book where book_id = ? ";
	$stmt = $pdh->prepare($sql3);
	$stmt->execute([$masach]);
	$arr = $stmt->fetch(PDO::FETCH_ASSOC);
}
$tensach = $arr["book_name"] ?? "";
$gia = $arr["price"] ?? "";
?>
</table>
</div>
<form action="lab8_3.php" method="post">
	Mã sách:<input type="text" name="book_id" value="<?php echo $masach ?>" required><br>
	Tên sách:<input type="text" name="book_name" value="<?php echo $tensach ?>" required><br>
	Giá: <input type="text" name="price" value="<?php echo $gia?>"><br>
	Loại sách:
	<select name="category" id="">
		<option value="">Chọn loại sách</option>
		<?php
			foreach($rows as $v){
				?>
					<option value="<?php echo $v["cat_id"] ?>"><?php echo $v["cat_name"] ?></option>
				<?php
			}
		 ?>
	</select><br>
	Nhà xuất bản:
	<select name="publisher" id="">
		<option value="">Chọn nhà xuất bản</option>
		<?php
			foreach($publishers as $v){
				?>
					<option value="<?php echo $v["pub_id"] ?>"><?php echo $v["pub_name"] ?></option>
				<?php
			}
		 ?>
	</select><br>
	<input type="submit" name="submit" value="Thêm">
	<input type="submit" name="submitSua" value="Sửa">
</form>
<table border="1">
	<tr>
		<th>Mã sách</th>
		<th>Tên sách</th>
		<th>Giá</th>
		<th>Loại sách</th>
		<th>Nhà xuất bản</th>
		<th colspan="2">Hành động</th>
	</tr>
	<?php
		foreach($books as $v){
			?>
				<tr>
					<td><?php echo $v["book_id"] ?></td>
					<td><?php echo $v["book_name"] ?></td>
					<td><?php echo $v["price"] ?></td>
					<td><?php echo $v["cat_name"] ?></td>
					<td><?php echo $v["pub_name"] ?></td>
					<td><a href="/lab8_3.php?book_id=<?php echo $v["book_id"] ?>">Xóa</a></td>
					<td><a href="/lab8_3.php?masach=<?php echo $v["book_id"] ?>">Sửa</a></td>
				</tr>
			<?php
		}
	 ?>
</table>
<?php
// Lấy giá trị của trường "book_id" từ dữ liệu POST, gán chuỗi rỗng nếu không tồn tại (sử dụng toán tử null coalescing ??)
$book_id = $_POST["book_id"] ?? "";
// Lấy giá trị của trường "book_name" từ dữ liệu POST
$book_name = $_POST["book_name"] ?? "";
// Lấy giá trị của trường "price" từ dữ liệu POST
$price = $_POST["price"] ?? "";
// Lấy giá trị của trường "category" (ID loại sách) từ dữ liệu POST
$cat_id = $_POST["category"] ?? "";
// Lấy giá trị của trường "publisher" (ID nhà xuất bản) từ dữ liệu POST
$pub_id = $_POST["publisher"] ?? "";
// Lấy giá trị của nút submit cho chức năng "Thêm"
$submit = $_POST["submit"] ?? "";
// Lấy giá trị của nút submit cho chức năng "Sửa"
$submitSua = $_POST["submitSua"] ?? "";
// Kiểm tra xem nút submit cho chức năng Thêm (tên là "submit") đã được nhấn hay chưa
if($submit){
    // Định nghĩa câu truy vấn SQL INSERT với Placeholders dấu chấm hỏi (?)
    // Chèn dữ liệu mới vào các cột của bảng 'book'
    $sql4 = "insert into book(book_id, book_name, price, cat_id, pub_id) values(?,?,?,?,?)";
    // Chuẩn bị (prepare) câu truy vấn SQL để đảm bảo an toàn
    $stmt = $pdh->prepare($sql4);
    // Thực thi câu truy vấn, truyền các giá trị theo ĐÚNG THỨ TỰ của Placeholders
    // [book_id, book_name, price, cat_id, pub_id]
    $stmt->execute([$book_id, $book_name, $price, $cat_id, $pub_id]);
    ?>
    // Mở khối PHP để chèn mã JavaScript thông báo
    <script>
        // Hiển thị hộp thoại thông báo thành công
        alert("Thêm thành công");
    </script>
    <?php
    // Đóng khối PHP
}
// Kiểm tra xem nút submit cho chức năng Sửa (tên là "submitSua") đã được nhấn hay chưa
if($submitSua){
    // Định nghĩa câu truy vấn SQL UPDATE với Placeholders dấu chấm hỏi (?)
    // Cập nhật các trường book_name, price, cat_id, pub_id dựa trên điều kiện book_id
    $sql4 = "update book set book_name = ?, price = ?, cat_id = ?, pub_id = ? where book_id = ?";
    // Chuẩn bị (prepare) câu truy vấn SQL để đảm bảo an toàn
    $stmt = $pdh->prepare($sql4);
    // Thực thi câu truy vấn, truyền các giá trị theo ĐÚNG THỨ TỰ của Placeholders
    // Thứ tự: [book_name (giá trị mới), price (mới), cat_id (mới), pub_id (mới), book_id (điều kiện WHERE)]
    $stmt->execute([$book_name, $price, $cat_id, $pub_id, $book_id]);
    ?>
    // Mở khối PHP để chèn mã JavaScript thông báo
    <script>
        // Lưu ý: Thông báo này đang bị viết nhầm thành "Thêm thành công", cần sửa lại thành "Cập nhật thành công"
        alert("Sửa thành công"); 
    </script>
    <?php
    // Đóng khối PHP
}
	
 ?>
</body>
</html>