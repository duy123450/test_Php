<?php
// Giả định class Db đã được định nghĩa và có sẵn ở đây

class News extends Db {
    // Tên bảng tin tức
    private $table = 'news'; 

    /**
     * Trả về danh sách tất cả tin tức.
     * @return array Mảng chứa danh sách các tin tức.
     */
    public function listAll() {
        // Có thể thêm ORDER BY để sắp xếp theo ngày đăng mới nhất
        $sql = "SELECT id, title, summary, created_at FROM {$this->table} ORDER BY created_at DESC";
        // Gọi phương thức select() của class cha Db
        return $this->select($sql); 
    }

    /**
     * Trả về chi tiết một tin tức theo ID.
     * @param int $id ID của tin tức
     * @return array|false Thông tin chi tiết của tin hoặc false nếu không tìm thấy.
     */
    public function detail($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        // Gọi phương thức select() của class cha Db với prepared statement
        $result = $this->select($sql, [$id]);
        // Trả về dòng đầu tiên hoặc false
        return count($result) ? $result[0] : false; 
    }
    
    // --- Các chức năng quản lý (CRUD) bổ sung (tùy chọn) ---

    /**
     * Thêm mới một tin tức.
     * @param array $data Mảng dữ liệu tin tức (title, content, user_id, ...)
     * @return int Số dòng đã thêm.
     */
    public function addNews($data) {
        $sql = "INSERT INTO {$this->table} (title, content, user_id, created_at) VALUES (?, ?, ?, NOW())";
        $arr = [$data['title'], $data['content'], $data['user_id']];
        return $this->insert($sql, $arr);
    }
    
    /**
     * Cập nhật một tin tức theo ID.
     * @param int $id ID tin tức
     * @param array $data Mảng dữ liệu cập nhật
     * @return int Số dòng đã cập nhật.
     */
    public function updateNews($id, $data) {
        $sql = "UPDATE {$this->table} SET title = ?, content = ?, updated_at = NOW() WHERE id = ?";
        $arr = [$data['title'], $data['content'], $id];
        return $this->update($sql, $arr);
    }

    /**
     * Xóa một tin tức theo ID.
     * @param int $id ID tin tức
     * @return int Số dòng đã xóa.
     */
    public function deleteNews($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->delete($sql, [$id]);
    }
}