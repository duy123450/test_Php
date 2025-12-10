<?php
// Giả định class Db đã được định nghĩa và có sẵn ở đây

class User extends Db {
    // Tên bảng người dùng
    private $table = 'user';

    // ------------------- 1. ĐĂNG KÝ (REGISTER/INSERT) -------------------

    /**
     * Thêm người dùng mới vào cơ sở dữ liệu.
     * @param string $username Tên đăng nhập
     * @param string $password Mật khẩu (Nên là mật khẩu đã được hash)
     * @param string $email Email người dùng
     * @param string $fullname Tên đầy đủ
     * @return int Số dòng đã được thêm (1 nếu thành công).
     */
    public function register($username, $password, $email, $fullname) {
        // Trong môi trường thực tế: $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO {$this->table} (username, password, email, fullname) 
                VALUES (?, ?, ?, ?)";
        
        // Sử dụng mật khẩu thô cho ví dụ này, nhưng CẢNH BÁO không nên dùng trong thực tế!
        $arr = [$username, $password, $email, $fullname];
        
        return $this->insert($sql, $arr);
    }

    // ------------------- 2. ĐĂNG NHẬP (LOGIN/SELECT) -------------------

    /**
     * Kiểm tra thông tin đăng nhập.
     * @param string $username Tên đăng nhập
     * @param string $password Mật khẩu thô (cần hash trong thực tế)
     * @return array|false Thông tin người dùng (trừ mật khẩu) nếu hợp lệ, ngược lại false.
     */
    public function login($username, $password) {
        $sql = "SELECT id, username, email, fullname, password FROM {$this->table} WHERE username = ?";
        
        $result = $this->select($sql, [$username]);
        
        if (count($result) == 1) {
            $user = $result[0];
            
            // TRONG THỰC TẾ: if (password_verify($password, $user['password'])) { ... }
            // Dùng so sánh thô cho ví dụ này:
            if ($password === $user['password']) {
                unset($user['password']); // Loại bỏ mật khẩu trước khi trả về
                return $user;
            }
        }
        return false;
    }

    // ------------------- 3. SỬA ĐỔI THÔNG TIN (UPDATE) -------------------

    /**
     * Cập nhật thông tin cá nhân của người dùng.
     * @param int $id ID của người dùng cần sửa đổi
     * @param array $data Mảng dữ liệu mới (ví dụ: ['email', 'fullname'])
     * @return int Số dòng đã được cập nhật.
     */
    public function updateUserInfo($id, $data) {
        // Cho phép sửa email và fullname
        $sql = "UPDATE {$this->table} SET email = ?, fullname = ? WHERE id = ?";
        
        $arr = [$data['email'], $data['fullname'], $id];
        
        return $this->update($sql, $arr);
    }

    /**
     * Thay đổi mật khẩu người dùng.
     * @param int $id ID của người dùng
     * @param string $new_password Mật khẩu mới (Nên là mật khẩu đã được hash)
     * @return int Số dòng đã được cập nhật.
     */
    public function changePassword($id, $new_password) {
        // Trong môi trường thực tế: $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE {$this->table} SET password = ? WHERE id = ?";
        
        // Sử dụng mật khẩu thô cho ví dụ này, nhưng CẢNH BÁO không nên dùng trong thực tế!
        $arr = [$new_password, $id];
        
        return $this->update($sql, $arr);
    }
    
    // ------------------- 4. HỖ TRỢ (SELECT) -------------------

    /**
     * Lấy thông tin người dùng theo ID (trừ mật khẩu).
     * @param int $id ID người dùng
     * @return array|false Thông tin chi tiết.
     */
    public function getById($id) {
        $sql = "SELECT id, username, email, fullname FROM {$this->table} WHERE id = ?";
        $result = $this->select($sql, [$id]);
        return count($result) ? $result[0] : false;
    }
}