<?php
$pdo1 = new PDO('mysql:host=localhost:3307;dbname=testdb', 'root', '');
$pdo1->query('SET NAMES utf8');
$sql = 'SELECT * FROM book';
$stmt = $pdo1->query(query: $sql);
$n = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="./vd2.php" method="get">
    ten <input type="text" name="key" id="">
    <input type="submit" value="tim kiem">
</form>
<h1>KQ tim kiem <?php echo $n ?></h1>
<table border="1" cellspacing="0" cellpadding="0">
    <?php
    foreach ($data as $row) {
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>