<?php
class Book extends Db{
    // Tên bảng mà class này thao tác
    private $table = 'book';
    public function getRand($n)
    {
        // Lấy ngẫu nhiên $n cuốn sách (có thể tối ưu bằng cách truyền $n vào mảng tham số nếu dùng prepared statement)
        $sql="select book_id, book_name, img from {$this->table} order by rand() limit 0, $n ";
        return $this->select($sql); 
    }
    public function getByPubliser($manhaxb)
    {
        $sql="select book_id, book_name, img from {$this->table} where pub_id = ? ";
        return $this->select($sql, [$manhaxb]); 
    }
    // Phương thức bổ sung: Lấy sách theo ID để phục vụ chức năng Sửa
    public function getBookById($book_id) {
        $sql = "SELECT * FROM {$this->table} WHERE book_id = ?";
        $result = $this->select($sql, [$book_id]);
        return count($result) ? $result[0] : false;
    }
    /**
     * Thêm mới một cuốn sách vào cơ sở dữ liệu.
     * @param array $data Mảng dữ liệu: ['book_id', 'book_name', 'price', 'cat_id', 'pub_id', 'img']
     * @return int Số dòng đã thêm (1 nếu thành công, 0 nếu thất bại)
     */
    public function addBook($data) {
        $sql = "
            INSERT INTO {$this->table} 
            (book_id, book_name, price, cat_id, pub_id, img) 
            VALUES (?, ?, ?, ?, ?, ?)
        ";
        // Truyền các giá trị theo đúng thứ tự của dấu ?
        $arr = [
            $data['book_id'],
            $data['book_name'],
            $data['price'],
            $data['cat_id'], 
            $data['pub_id'],
            $data['img'] ?? null // Thêm trường img, nếu không có thì gán null
        ];
        return $this->insert($sql, $arr);
    }
    /**
     * Cập nhật thông tin của một cuốn sách.
     * @param string $book_id Mã sách cần sửa
     * @param array $data Mảng dữ liệu mới: ['book_name', 'price', 'cat_id', 'pub_id', 'img']
     * @return int Số dòng đã được cập nhật
     */
    public function updateBook($book_id, $data) {
        $sql = "
            UPDATE {$this->table} 
            SET book_name = ?, price = ?, cat_id = ?, pub_id = ?, img = ?
            WHERE book_id = ?
        ";
        // Truyền các giá trị theo đúng thứ tự của dấu ? (giá trị mới trước, điều kiện WHERE sau)
        $arr = [
            $data['book_name'],
            $data['price'],
            $data['cat_id'],
            $data['pub_id'],
            $data['img'] ?? null,
            $book_id // Điều kiện WHERE cuối cùng
        ];

        return $this->update($sql, $arr);
    }
    /**
     * Xóa một cuốn sách theo ID.
     * @param string $book_id Mã sách cần xóa
     * @return int Số dòng đã xóa
     */
    public function deleteBook($book_id) {
        $sql = "DELETE FROM {$this->table} WHERE book_id = ?";
        return $this->delete($sql, [$book_id]);
    }
	public function getBooksByPage($page, $limit) {
        // 1. Tính toán OFFSET (vị trí bắt đầu lấy dữ liệu)
        // Trang 1: offset = (1 - 1) * limit = 0
        // Trang 2: offset = (2 - 1) * limit = limit
        $offset = ($page - 1) * $limit; 

        // 2. Xây dựng truy vấn SELECT với JOIN, ORDER BY, LIMIT và OFFSET
        $sql = "
            SELECT 
                b.book_id, 
                b.book_name, 
                b.price, 
                c.cat_name, 
                p.pub_name 
            FROM 
                {$this->table} b
            INNER JOIN 
                category c ON b.cat_id = c.cat_id
            INNER JOIN 
                publisher p ON b.pub_id = p.pub_id
            ORDER BY b.book_id DESC 
            LIMIT ?, ?
        ";
        
        // 3. Thực thi truy vấn. Truyền $offset và $limit vào mảng tham số
        // PHP PDO sẽ tự động hiểu $offset và $limit là kiểu int.
        return $this->select($sql, [$offset, $limit]);
    }
}
?>