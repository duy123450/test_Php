<?php
// Giả định class Db đã được định nghĩa và có sẵn ở đây

class Cart extends Db {
    // Tên bảng lưu trữ các mục trong giỏ hàng
    private $table = 'cart_item'; 

    // ------------------- 1. HIỂN THỊ (READ/SELECT) -------------------

    /**
     * Lấy và hiển thị toàn bộ nội dung giỏ hàng của một người dùng.
     * @param int $user_id ID người dùng
     * @return array Danh sách các mục trong giỏ hàng với thông tin sách chi tiết.
     */
    public function getCartItems($user_id) {
        $sql = "
            SELECT 
                ci.book_id, 
                b.book_name, 
                b.price, 
                ci.quantity, 
                (b.price * ci.quantity) AS total_item_price
            FROM 
                {$this->table} ci
            INNER JOIN 
                book b ON ci.book_id = b.book_id
            WHERE 
                ci.user_id = ?
        ";
        // Gọi phương thức select() của class cha Db với prepared statement
        return $this->select($sql, [$user_id]); 
    }

    /**
     * Tính tổng giá trị của toàn bộ giỏ hàng.
     * @param int $user_id ID người dùng
     * @return float Tổng tiền giỏ hàng.
     */
    public function getTotalPrice($user_id) {
        $sql = "
            SELECT 
                SUM(b.price * ci.quantity) AS total_price
            FROM 
                {$this->table} ci
            INNER JOIN 
                book b ON ci.book_id = b.book_id
            WHERE 
                ci.user_id = ?
        ";
        $result = $this->select($sql, [$user_id]);
        // Trả về tổng tiền (hoặc 0 nếu giỏ hàng trống)
        return $result[0]['total_price'] ?? 0;
    }

    // ------------------- 2. QUẢN LÝ (MANAGE/CRUD) -------------------

    /**
     * Thêm/Cập nhật số lượng sản phẩm trong giỏ hàng.
     * Phương thức này sử dụng cú pháp MySQL 'ON DUPLICATE KEY UPDATE' để xử lý cả
     * việc thêm mới (nếu chưa có) và cập nhật số lượng (nếu đã có).
     * Yêu cầu `(user_id, book_id)` là UNIQUE KEY trong bảng `cart_item`.
     * @param int $user_id ID người dùng
     * @param string $book_id ID sách
     * @param int $quantity Số lượng sản phẩm được thêm vào (hoặc cập nhật)
     * @return int Số dòng bị ảnh hưởng (1 hoặc 2)
     */
    public function addOrUpdateItem($user_id, $book_id, $quantity) {
        $sql = "
            INSERT INTO {$this->table} (user_id, book_id, quantity) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
            quantity = quantity + VALUES(quantity)
        ";
        $arr = [$user_id, $book_id, $quantity];
        // Dùng insert() vì nó trả về số dòng bị ảnh hưởng (cả insert và update)
        return $this->insert($sql, $arr); 
    }
    
    /**
     * Cập nhật số lượng sản phẩm trực tiếp (thay vì cộng thêm).
     * @param int $user_id ID người dùng
     * @param string $book_id ID sách
     * @param int $new_quantity Số lượng mới
     * @return int Số dòng đã cập nhật.
     */
    public function setItemQuantity($user_id, $book_id, $new_quantity) {
        // Đảm bảo số lượng không âm
        if ($new_quantity < 1) {
            return $this->removeItem($user_id, $book_id);
        }
        
        $sql = "UPDATE {$this->table} SET quantity = ? WHERE user_id = ? AND book_id = ?";
        $arr = [$new_quantity, $user_id, $book_id];
        return $this->update($sql, $arr);
    }

    /**
     * Xóa một sản phẩm cụ thể khỏi giỏ hàng.
     * @param int $user_id ID người dùng
     * @param string $book_id ID sách
     * @return int Số dòng đã xóa.
     */
    public function removeItem($user_id, $book_id) {
        $sql = "DELETE FROM {$this->table} WHERE user_id = ? AND book_id = ?";
        return $this->delete($sql, [$user_id, $book_id]);
    }
    
    /**
     * Xóa sạch toàn bộ giỏ hàng của người dùng (sau khi đặt hàng).
     * @param int $user_id ID người dùng
     * @return int Số dòng đã xóa.
     */
    public function clearCart($user_id) {
        $sql = "DELETE FROM {$this->table} WHERE user_id = ?";
        return $this->delete($sql, [$user_id]);
    }
}