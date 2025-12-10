drop database if exists bookstore;
create database bookstore;
use bookstore;

create table khachhang(
	email varchar(50) primary key,
    matkhau varchar(32),
    tenkh varchar(50),
    diachi varchar(100),
    dienthoai varchar(11)
);

create table hoadon(
	mahd int(11) auto_increment primary key,
    email varchar(50),
    ngayhd datetime,
    tennguoinhan varchar(50),
    diachinguoinhan varchar(80),
    ngaynhan date,
    dienthoainguoinhan varchar(11),
    trangthai tinyint(4) default 0,
    foreign key (email) references khachhang(email)
);

create table nhaxb(
	manxb varchar(5) primary key,
    tennxb text
);

create table loai(
	maloai varchar(5) primary key,
    tenloai varchar(50)
);

create table sach(
	masach varchar(15) primary key,
    tensach varchar(250),
    mota text,
    gia float,
    hinh varchar(50),
    manxb varchar(5),
    maloai varchar(5),
    foreign key (manxb) references nhaxb(manxb),
    foreign key (maloai) references loai(maloai)
);

create table chitiethd(
	mahd int(11),
    masach varchar(15),
    soluong tinyint(4),
    gia float,
    primary key (mahd, masach),
    foreign key (mahd) references hoadon(mahd),
    foreign key (masach) references sach(masach)
);

---
## 1. Data for `loai` (Category)
-- Columns: maloai, tenloai
INSERT INTO loai (maloai, tenloai) VALUES
('VH', 'Văn Học'),
('KHCN', 'Khoa Học Công Nghệ'),
('KINH', 'Kinh Tế'),
('THIEU', 'Sách Thiếu Nhi');

---
## 2. Data for `nhaxb` (Publisher)
-- Columns: manxb, tennxb
INSERT INTO nhaxb (manxb, tennxb) VALUES
('TRE', 'Nhà Xuất Bản Trẻ'),
('FAH', 'Fahasa'),
('ALPHA', 'Alpha Books'),
('KIMD', 'Nhà Xuất Bản Kim Đồng');

---
## 3. Data for `khachhang` (Customer)
-- Columns: email, matkhau, tenkh, diachi, dienthoai
INSERT INTO khachhang (email, matkhau, tenkh, diachi, dienthoai) VALUES
('nguyenvanA@example.com', MD5('password123'), 'Nguyễn Văn A', '123 Đường Trần Phú, TP.HCM', '0901234567'),
('tranb@test.com', MD5('securepwd'), 'Trần Thị B', '456 Lê Lợi, Hà Nội', '0919876543'),
('lephuongc@mail.vn', MD5('userpass'), 'Lê Phương C', '789 Nguyễn Huệ, Đà Nẵng', '0987654321');

---
## 4. Data for `sach` (Book)
-- Columns: masach, tensach, mota, gia, hinh, manxb, maloai
INSERT INTO sach (masach, tensach, mota, gia, hinh, manxb, maloai) VALUES
('VH001', 'Đắc Nhân Tâm', 'Nghệ thuật thu phục lòng người', 150000.0, 'sach_01.jpg', 'TRE', 'VH'),
('KHCN002', 'Lược Sử Thời Gian', 'Giải thích các khái niệm cơ bản về vũ trụ', 220000.0, 'sach_02.jpg', 'FAH', 'KHCN'),
('KINH003', 'Cha Giàu Cha Nghèo', 'Bí quyết tài chính cá nhân', 125000.0, 'sach_03.jpg', 'ALPHA', 'KINH'),
('THIEU004', 'Dế Mèn Phiêu Lưu Ký', 'Truyện đồng thoại kinh điển', 85000.0, 'sach_04.jpg', 'KIMD', 'THIEU'),
('VH005', 'Tiểu Thuyết Ngắn', 'Tuyển tập các tác phẩm ngắn', 90000.0, 'sach_05.jpg', 'TRE', 'VH');

---
## 5. Data for `hoadon` (Invoice)
-- Columns: mahd, email, ngayhd, tennguoinhan, diachinguoinhan, ngaynhan, dienthoainguoinhan, trangthai
-- Note: 'ngayhd' should be DATETIME, 'ngaynhan' should be DATE
INSERT INTO hoadon (email, ngayhd, tennguoinhan, diachinguoinhan, ngaynhan, dienthoainguoinhan, trangthai) VALUES
('nguyenvanA@example.com', NOW(), 'Nguyễn Văn A', '123 Đường Trần Phú, TP.HCM', CURDATE() + INTERVAL 3 DAY, '0901234567', 1), -- Completed
('tranb@test.com', NOW(), 'Trần Thị B', '456 Lê Lợi, Hà Nội', CURDATE() + INTERVAL 5 DAY, '0919876543', 0), -- Pending
('nguyenvanA@example.com', NOW(), 'Nguyễn Văn A', '123 Đường Trần Phú, TP.HCM', CURDATE() + INTERVAL 2 DAY, '0901234567', 0); -- Pending

---
## 6. Data for `chitiethd` (Invoice Details)
-- Columns: mahd, masach, soluong, gia
-- mahd must match an existing hoadon.mahd. masach must match an existing sach.masach.
-- Note: This table has a composite primary key (mahd, masach), so 'mahd' is NOT the only PK.

INSERT INTO chitiethd (mahd, masach, soluong, gia) VALUES
-- Order 1 (mahd=1) for 'nguyenvanA@example.com'
(1, 'VH001', 1, 150000.0), -- 1 x Đắc Nhân Tâm
(1, 'KHCN002', 2, 220000.0), -- 2 x Lược Sử Thời Gian

-- Order 2 (mahd=2) for 'tranb@test.com'
(2, 'KINH003', 3, 125000.0), -- 3 x Cha Giàu Cha Nghèo

-- Order 3 (mahd=3) for 'nguyenvanA@example.com'
(3, 'THIEU004', 1, 85000.0), -- 1 x Dế Mèn Phiêu Lưu Ký
(3, 'VH005', 1, 90000.0); -- 1 x Tiểu Thuyết Ngắn

-- ================
-- View
-- ================
-- Cau 4.5
create view top_10_gia as
select tensach, gia
from sach
order by gia desc
limit 10;
--
select * from top_10_gia;

-- Cau 5.4
create view top_10_sach as
select s.masach, s.tensach, sum(c.soluong) as total
from chitiethd c join sach s on c.masach = s.masach
group by s.masach, s.tensach
order by total desc
limit 10;
-- 
select * from top_10_sach;
-- ================
-- Procedure
-- ================
-- Cau 4.6
DELIMITER $$
create procedure timMaSach(in p_maloai varchar(5))
begin
	select masach, tensach
    from sach
    where maloai = p_maloai;
end $$
DELIMITER ;
--
CALL timMaSach('VH');

-- Cau 5.2
DELIMITER $$
create procedure updateSach(in idSach varchar(15), in gia_moi float)
begin
	update sach
    set gia = gia_moi
    where masach = idSach;
end $$
DELIMITER ;
--
call bookstore.updateSach("VH001", 100000.0);

-- ================
-- Query
-- ================
-- Cau 5.1
select s.masach, s.tensach, l.maloai, l.tenloai
from sach s join loai l on s.maloai = l.maloai
order by L.tenloai, S.tensach;

-- Cau 5.3
select s.masach, s.tensach, sum(c.soluong) as total
from chitiethd c join sach s on s.masach = c.masach
group by s.masach, s.tensach
order by total desc
limit 1;

-- Cau 5.5
-- mysqldump -u root -p bookstore > bookstore_backup.sql
-- "C:/Program Files/MySQL/MySQL Server 8.0/bin/mysqldump.exe" -u root -p bookstore > C:/Users/"ten user"/Desktop/bookstore_backup.sql

-- Cau 5.6
-- drop database bookstore

-- Cau 5.7
-- mysql -u root -p bookstore < bookstore_backup.sql
-- "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql" -u root -p bookstore < C:/Users/"ten user"/Desktop/bookstore_backup.sql