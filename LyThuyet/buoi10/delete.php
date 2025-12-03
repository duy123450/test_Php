<?php
include_once 'connection.php';
$id = $_POST['cat_id'] ?? '';
if ($id != '') {
    $sql = "DELETE FROM category WHERE cat_id = ?";
    $stmt = $pdo->prepare(query: $sql);
    $stmt->execute(params: [$id]);
}
header('location: index.php');
