<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="container">
    <h2>Dang ky thanh vien</h2>
    <form style="background-color: lightgrey;" action="./1.php" method="post" enctype="multipart/form-data" class="form-control">
        <label for="username">Tên đăng nhập (*):</label>
        <input type="text" id="username" name="username" required=""><br><br>
    
        <label for="password">Mật khẩu (*):</label>
        <input type="password" id="password" name="password" required=""><br><br>
    
        <label for="confirm_password">Nhập lại mật khẩu (*):</label>
        <input type="password" id="confirm_password" name="confirm_password" required=""><br><br>
    
        <label for="gender">Giới tính (*):</label><br>
        <input type="radio" id="male" name="gender" value="Nam" required="">
        <label for="male">Nam</label><br>
        <input type="radio" id="female" name="gender" value="Nữ" required="">
        <label for="female">Nữ</label><br><br>
    
        <label for="hobbies">Sở thích:</label><br>
        <textarea id="hobbies" name="hobbies"></textarea><br><br>
    
        <label for="image">Hình ảnh (tùy chọn):</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
    
        <label for="province">Tỉnh (*):</label>
        <select id="province" name="province" required="">
            <option value="">Chọn tỉnh</option>
            <option value="Hà Nội">Hà Nội</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Đà Nẵng">Đà Nẵng</option>
            <option value="Khánh Hòa">Khánh Hòa</option>
            <!-- Thêm các tỉnh khác nếu cần -->
        </select><br><br>
    
        <input type="submit" value="Đăng ký" class="btn btn-primary">
        <input type="reset" value="Reset" class="btn btn-danger">
    </form>
    
</body>
</html>

