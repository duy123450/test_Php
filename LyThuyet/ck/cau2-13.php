<?php
$pdo = new PDO("mysql:host=localhost:3307;dbname=bookstore", "root", "");
$stmt = $pdo->query('select * from book');
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

// kq dung
echo $data[0]->book_id;