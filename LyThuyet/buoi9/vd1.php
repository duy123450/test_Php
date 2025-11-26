<?php
$pdo1 = new PDO('mysql:host=localhost:3307;dbname=testdb', 'root', '');
$pdo1->query('SET NAMES utf8');
$sql = 'SELECT * FROM book';
$stmt = $pdo1->query(query: $sql); // PDOStatement
$n = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<h1>Co $n cuon sach</h1>";
print_r($data);
$pdo1 = null; // Dong ket noi