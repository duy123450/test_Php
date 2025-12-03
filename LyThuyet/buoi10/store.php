<?php
include_once 'connection.php';
$id = $_POST['cat_id'] ?? '';
$name = $_POST['cat_name'] ?? '';
if ($id != '') {
    $sql = "INSERT INTO catagory(cat_id, cat_name) VALUES(?, ?)";
    $arr = [$id, $name];
    $stmt = $pdo->prepare(query: $sql);
    $stmt->execute(params: $arr);
    $n = $stmt->rowCount();
    echo "<a href='index.php'>Back to list</a>";
} else {
    header('location: index.php');
}
