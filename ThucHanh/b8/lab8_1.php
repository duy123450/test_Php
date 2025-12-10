<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab8_1- PDO - Mysql </title>
</head>

<body>
<?php
// Bắt đầu khối try-catch để xử lý lỗi kết nối cơ sở dữ liệu
try{
// Tạo một đối tượng PDO (PHP Data Objects) để kết nối đến cơ sở dữ liệu MySQL
// "mysql:host=localhost; dbname=qlsach" - Chuỗi DSN (Data Source Name) chỉ định loại DB, host và tên DB
// "root" - Tên người dùng để kết nối
// "" - Mật khẩu để kết nối (thường là trống cho môi trường phát triển cục bộ)
$pdh = new PDO("mysql:host=localhost; dbname=qlsach"  , "root"  , ""  );
// Thực hiện một truy vấn để thiết lập bộ ký tự (charset) cho kết nối là 'utf8'
// Điều này giúp đảm bảo dữ liệu hiển thị đúng tiếng Việt có dấu
$pdh->query("  set names 'utf8'"  );
}
// Bắt khối catch để bắt ngoại lệ (Exception) nếu kết nối thất bại
catch(Exception $e){
    // In ra thông báo lỗi nếu có lỗi xảy ra trong khối try
    echo $e->getMessage();
    // Dừng việc thực thi script
    exit;
}

// Thực hiện truy vấn SQL "select * from category" và trả về đối tượng statement
$stm = $pdh->query("  select * from category"  );
// In ra số lượng dòng (bản ghi) được trả về bởi truy vấn
echo "  Số dòng:"  . $stm->rowCount();
// Lấy tất cả các dòng kết quả và lưu vào mảng $rows1
// PDO::FETCH_ASSOC - Chỉ định rằng kết quả sẽ được trả về dưới dạng mảng kết hợp (key là tên cột)
$rows1 =$stm->fetchAll(PDO::FETCH_ASSOC);

// Lặp qua mảng các dòng kết quả
foreach($rows1 as $row)
{
    // In ra cat_id và cat_name của từng dòng, cách nhau bằng dấu "-" và xuống dòng
    echo "<br>".$row["cat_id"] ."-"  . $row["cat_name"]   ;
}
?><hr />
<?php

// Thực hiện truy vấn SQL "select * from publisher" và trả về đối tượng statement
$stm = $pdh->query("select * from publisher ");
// In ra số lượng dòng (bản ghi) được trả về bởi truy vấn
echo "  Số dòng:"  . $stm->rowCount();
// Lấy tất cả các dòng kết quả và lưu vào mảng $rows2
// PDO::FETCH_OBJ - Chỉ định rằng kết quả sẽ được trả về dưới dạng đối tượng (property là tên cột)
$rows2 = $stm->fetchAll(PDO::FETCH_OBJ);
// Dòng này được chú thích, nếu bỏ chú thích sẽ in cấu trúc của mảng $rows2
//print_r($rows2);
// Lặp qua mảng các đối tượng kết quả
foreach($rows2 as $row)
{
    // In ra pub_id và pub_name của từng đối tượng, truy cập qua thuộc tính đối tượng
    echo "<br>".$row->pub_id ."-". $row->pub_name ;
}
?>

<hr />
<?php
// Định nghĩa câu truy vấn SQL để tìm sách có tên chứa ký tự 'a'
$sql = "select * from book where book_name like '%a%' ";
// Thực hiện truy vấn SQL đã định nghĩa
$stm = $pdh->query($sql);
// In ra số lượng dòng (bản ghi) được trả về bởi truy vấn
echo "  Số dòng:"  . $stm->rowCount();
// Lấy tất cả các dòng kết quả và lưu vào mảng $rows3
// PDO::FETCH_NUM - Chỉ định rằng kết quả sẽ được trả về dưới dạng mảng được đánh chỉ mục bằng số (0, 1, 2,...)
$rows3 = $stm->fetchAll(PDO::FETCH_NUM);
// Dòng này được chú thích, nếu bỏ chú thích sẽ in cấu trúc của mảng $rows3
//print_r($rows3);
// Lặp qua mảng các dòng kết quả
foreach($rows3 as $row)
{
    // In ra cột đầu tiên (chỉ mục 0, thường là ID) và cột thứ hai (chỉ mục 1, thường là tên)
    echo "<br>".$row[0] ."-". $row[1] ;
}
echo "<hr>";
// Thực hiện truy vấn SQL " select * from category"
$stm = $pdh->query(" select * from category"  );
// In ra số lượng dòng (bản ghi) được trả về bởi truy vấn
echo "  Số dòng:"  . $stm->rowCount();
// Lấy dòng kết quả **đầu tiên** và lưu vào biến $row dưới dạng mảng kết hợp
$row = $stm->fetch(PDO::FETCH_ASSOC);
// In cấu trúc và giá trị của dòng kết quả đầu tiên
print_r($row);
// Lấy dòng kết quả **thứ hai** (di chuyển con trỏ) và lưu vào biến $row dưới dạng mảng kết hợp
$row = $stm->fetch(PDO::FETCH_ASSOC);
// In cấu trúc và giá trị của dòng kết quả thứ hai
print_r($row);
echo "<hr>";
// Thực hiện truy vấn SQL "select * from publisher"
$stm = $pdh->query("select * from publisher");
// Bắt đầu vòng lặp while: tiếp tục lặp chừng nào $stm->fetch(PDO::FETCH_ASSOC) còn trả về một dòng dữ liệu
// fetch() sẽ lấy từng dòng một cho đến khi hết
while($row = $stm->fetch(PDO::FETCH_ASSOC))
{
    // In ra pub_id và pub_name của từng dòng
    echo "<br>".$row["pub_id"] ."-"  . $row["pub_name"]   ;
}
?>
</body>
</html>