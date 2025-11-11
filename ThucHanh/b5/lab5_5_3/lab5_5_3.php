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

    <script>
        (function() {
            const form = document.getElementById('regForm');
            const errorBox = document.getElementById('errorBox');
            const genderError = document.getElementById('genderError');
            const imgInput = document.getElementById('image');

            function showErrors(errors) {
                if (!errors.length) {
                    errorBox.innerHTML = '';
                    return;
                }
                const list = errors.map(e => `<li>${e}</li>`).join('');
                errorBox.innerHTML = `<div class="alert alert-danger" role="alert"><ul class="mb-0">${list}</ul></div>`;
            }

            function validateImage(file) {
                if (!file) return null;
                const maxSize = 2 * 1024 * 1024; // 2MB
                const allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
                if (file.size > maxSize) return 'Ảnh vượt quá 2MB.';
                if (!allowed.includes(file.type)) return 'Định dạng ảnh không hợp lệ.';
                return null;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // use HTML5 constraint validation first
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                }

                const errors = [];

                // Username & password handled by constraint API, extra checks:
                const pwd = document.getElementById('password').value.trim();
                const cpwd = document.getElementById('confirm_password').value.trim();
                if (pwd && cpwd && pwd !== cpwd) {
                    errors.push('Mật khẩu và mật khẩu xác nhận không khớp.');
                    document.getElementById('confirm_password').classList.add('is-invalid');
                } else {
                    document.getElementById('confirm_password').classList.remove('is-invalid');
                }

                // Gender check (radio)
                const gender = form.querySelector('input[name="gender"]:checked');
                if (!gender) {
                    genderError.style.display = 'block';
                    errors.push('Vui lòng chọn giới tính.');
                } else {
                    genderError.style.display = 'none';
                }

                // Image check
                const file = imgInput.files[0];
                const imgErr = validateImage(file);
                if (imgErr) errors.push(imgErr);

                // If any HTML5 required fields invalid, add message
                if (!form.reportValidity()) {
                    // reportValidity already triggers browser messages; include generic message
                    errors.unshift('Vui lòng kiểm tra các trường bắt buộc.');
                }

                showErrors(errors);

                if (errors.length === 0) {
                    // all good -> submit to server
                    form.submit();
                }
            }, false);

            // Reset UI on form reset
            document.getElementById('btnReset').addEventListener('click', function() {
                form.classList.remove('was-validated');
                errorBox.innerHTML = '';
                genderError.style.display = 'none';
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            });
        })();
    </script>
</body>

</html>