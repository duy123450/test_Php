<?php
include_once 'connection.php';
$key = $_GET['key'] ?? '';
$sql = "SELECT * FROM category WHERE cat_name LIKE ?";
$arr = ["%$key%"];
$stmt = $pdo->prepare(query: $sql);
$stmt->execute(params: $arr);
$n = $stmt->rowCount();
$data = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);
?>

<form action="store.php" method="post">
    id <input type="text" name="cat_id" id=""><br>
    name <input type="text" name="cat_name" id=""><br>
    <input type="submit" value="Add">
</form>

<hr>

<form action="index.php" method="get">
    <input type="text" name="key" id=""><br>
    <input type="submit" value="Search">
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Cat ID</th>
        <th>Cat Name</th>
        <th>Actions</th>
    <?php
    foreach ($data as $item) {
        echo "<tr>
            <td>{$item['cat_id']}</td>
            <td>{$item['cat_name']}</td>
            <td>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='cat_id' value='{$item['cat_id']}'>
                    <input type='submit' value='Delete'>
                </form>
                <form action='edit.php' method='get'>
                    <input type='hidden' name='cat_id' value='{$item['cat_id']}'>
                    <input type='submit' value='Edit'>
                </form>
            </td>
        </tr>";
    }
    ?>
</table>