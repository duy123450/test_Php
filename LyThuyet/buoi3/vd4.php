<?php
$m3 = [
    ['id' => 1, 'name' => 'SP1', 'price' => 2],
    ['id' => 2, 'name' => 'SP2', 'price' => 6],
    ['id' => 7, 'name' => 'SP3', 'price' => 5],
    ['id' => 9, 'name' => 'SP3', 'price' => 12]
];
?>

<table border="1" cellpadding="10">
    <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    <?php foreach ($m3 as $item): ?>
        <tr>
            <?php
            if ($item['price'] > 10) {
                echo "<style>tr:nth-child(" . ($stt + 1) . ") { background-color: red; }</style>";
            }
            ?>
            <td><?php static $stt = 1;
                echo $stt++; ?></td>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
        </tr>
    <?php endforeach; ?>