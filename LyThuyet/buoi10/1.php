<?php
# Ket noi
$pdo = new PDO('mysql:host=?; dbname=?', 'root', '');

# Viet SQL
$key = 'a'; // $key = $_GET['key'] ?? '';
$sql = "SELECT * FROM book WHERE bookname LIKE '%$key%'";

$sql1 = "SELECT * FROM book WHERE bookname LIKE ?";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute(["%$key%"]);

$sql2 = "SELECT * FROM book WHERE bookname LIKE :key1";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute(['key1' => "%$key%"]);

# Thuc thi
$stmt = $pdo->query($sql);

# Xu ly kq
$n = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo $r->bookname; // $r['bookname'];
}
